<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\{SessionBookings, Skill, UserSkills};


class TrainerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            // Check if the user is authenticated
            if (auth()->check()) {
                // Check the user's role
                if (auth()->user()->role != 3 ) {
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
        
        $data['items'] = SessionBookings::where('trainer_id',auth()->user()->id)->with(['trainer','user','skill'])->get();

        return view('user.trainer-session',$data);
    }


    public function changeSessionStatus(Request $request)
    {

        $sessionD = SessionBookings::where('id',$request->id)->where('trainer_id',auth()->user()->id)->first();

        $sessionD->status = $request->status;
        $sessionD->completed_at = date("Y-m-d H:i:s");
        
        $sessionD->save();
        return response()->json([
            'status'   => "success",
            'message'  => 'saved successfully',
        ], 200);

    }


     /**
     * Display a skill create form.
     */
    public function skillCreate()
    {
        $data['skills'] = Skill::where(['user_id' => auth()->user()->id])->get();
        return view('user.create-skill',$data);
    }

    /**
     * store trainer skills
     */
    public function storeSkills(Request $request)
    {

        // Validate the request
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // store data
        $data = Skill::create(['title' => $request->title, 'user_id' => auth()->user()->id]);
        UserSkills::create(['user_id' =>  auth()->user()->id, 'skill_id' => $data->id]);
        // Redirect with success message
        return redirect()->back()->with('success', 'Skill added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
