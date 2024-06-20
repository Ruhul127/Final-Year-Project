<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\SessionBookings;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            // Check if the user is authenticated
            if (auth()->check()) {
                // Check the user's role
                if (auth()->user()->role != 2) {
                    abort(401, 'Unauthorized');
                }
            }

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['cols'] = [
            'id'     => 'Id',
            'Trainer'     => 'Trainer',
            'User'     => 'user',
            'Session for Skill'     => 'Session for Skill',
            'start_datetime'  => 'Start date',
            'end_datetime'  => 'End date',
            'status'  => 'Status',
            // 'status' => 'Status',
            // 'action' => 'Action',

        ];
        
        $data['items'] = SessionBookings::where('user_id',auth()->user()->id)->with(['trainer','user','skill'])->orderBy('id','desc')->get();

        return view('user.user-session',$data);
    }

    public function addReview($id)
    {
        $data['userSession'] = SessionBookings::where('id',$id)->get();

        $review = Review::where([
            'user_id' => auth()->user()->id,
            'session_booking_id'=> $id,
        ])->first();

        $data['id'] = $id;
        $data['current_stars'] = isset($review->id) ? $review->rate: 0;
        $data['review'] = $review;
        return view('user.add-review',$data);
    }

    public function storeReview(Request $request)
    {
        // return $request->all();
          // Validate the request
          $validator = Validator::make($request->all(), [
            'rate' => 'required',
            // 'text_review' => 'required',
            // 'trainer_id' => 'required',
            // 'user_id' => 'required',
            'session_booking_id' => 'required'
        ]);

        // // Check if validation fails
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $userSession = SessionBookings::find($request->session_booking_id);

        // dd($userSession->trainer_id);

        // store data
        $data = Review::create([
            'rate' => $request->stars, 
            'text_review' => $request->review,
            'trainer_id' => $userSession->trainer_id, 
            'user_id' => auth()->user()->id,
            'session_booking_id'=> $request->session_booking_id,
        ]);
        // Redirect with success message
        return redirect()->back()->with('success', 'review added successfully!');
    }


    public function bookSession()
    {

        $data['title'] = "Session";
        $data['route_name'] = route('user-booking');

        $data['users'] = User::where('role', 2)->get();
        $data['trainers'] = User::where('role', 3)->get();
        return view("user.book", $data);
        // return view('user.book');
    }


    public function trainerSkills(Request $request)
    {
        try {

        $data =  Skill::where('user_id',$request->trainer)->get();
            
        return response()->json([
            'data'     => $data,
            'status'   => "success",
            'message'  => ' successfully',
        ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
        //
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            // 'user_id' => 'required',
            'trainer_id' => 'required',
            'skill' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
        ]);

        $image  = Null;

        // if ($request->hasFile('image')) {

        //     $folder = "assets/uploads/designer/";

        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $fileName = time() . '.' . $extension;
        //     $file->move($folder, $fileName);

        //     $image  = $folder . $fileName;
        // }

        SessionBookings::create([
            'user_id' => auth()->user()->id,
            'trainer_id' => $request->trainer_id,
            'trainer_skill_id' => $request->skill,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'status'       => 'pending'

            // Add more validation rules as needed
        ]);

        return redirect()->route('user-session')->with('success_message', 'Resource created successfully!');

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
