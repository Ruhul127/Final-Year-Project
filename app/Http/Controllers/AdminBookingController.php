<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SessionBookings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            // Check if the user is authenticated
            if (auth()->check()) {
                // Check the user's role
                if (auth()->user()->role != 1) {
                    abort(401, 'Unauthorized');
                }
            }

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Session";
        //
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
        //
        // $data['title'] = "Designers";
        $data['items'] = SessionBookings::with(['trainer','user','skill'])->get();
        return view("admin.pages.booking.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // 
        $data['title'] = "Session";
        $data['route_name'] = route('booking.store');

        $data['users'] = User::where('role', 2)->get();
        $data['trainers'] = User::where('role', 3)->get();
        return view("admin.pages.booking.add", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required',
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
            'user_id' => $request->user_id,
            'trainer_id' => $request->trainer_id,
            'trainer_skill_id' => $request->skill,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'status'       => 'accept'

            // Add more validation rules as needed
        ]);

        return redirect()->route('booking.index')->with('success_message', 'Resource created successfully!');

    }


    public function changeSessionStatus(Request $request)
    {

        // return $request->all();

        $sessionD = SessionBookings::where('id',$request->id)->first();

        $sessionD->status = $request->status;
        $sessionD->completed_at = date("Y-m-d H:i:s");
        
        $sessionD->save();
        return response()->json([
            'status'   => "success",
            'message'  => 'saved successfully',
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['title'] = "Edit designer";
        $data['route_name'] = route('admin.designer.update', $id);
        // $data['item'] = Designers::find($id);
        return view("admin.pages.designer.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $requests = $request->all();
        $validator = Validator::make($requests, [
            'name'          => 'required',
            'skill'         => 'required',
            'description'   => 'required',
            'status'   => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status'  => False,
                'data'    => $validator->messages()
            ], 422);
        }


        $image  = Null;

        if ($request->hasFile('image')) {

            $folder = "assets/uploads/designer/";

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move($folder, $fileName);

            $image  = $folder . $fileName;
        }

        $data = [
            'name' => $request->name,
            'skill_name'    => $request->skill,
            'avg_rating'    => $request->avg_rating,
            'total_rating'  => $request->total_rating,
            'description'   => $request->description,

            'status'        => $request->status,
        ];

        if (!empty($image)) {
            $data['image'] = $image;
        }
        // Designers::where('id',$id)->update($data);


        return response()->json([
            'status'   => "success",
            'message'  => 'saved successfully',
        ], 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        // Designers::where('id',$id)->delete();


        return response()->json([
            'status'   => "success",
            'message'  => 'Deleted successfully',
        ], 200);
    }
}
