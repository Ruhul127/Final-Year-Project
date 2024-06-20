<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminTrainerController extends Controller
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
        $data['title'] = "Trainers";
        //
        $data['cols'] = [
            'id'     => 'Id',
            'name'  => 'Name',
            'surname'  => 'Surname',
            'dob'    => 'D.O.B',
            'gender'    => 'Gender',
            'email'  => 'Email',
            // 'action' => 'Action',

        ];

        $data['items'] = User::where('role',3)->get();
        return view("admin.pages.trainer.list", $data);
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
        $requests = $request->all();
        $validator = Validator::make($requests, [
            'name'          => 'required',
            'skill'         => 'required',
            'description'   => 'required',
            'image'   => 'required',
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

        // Designers::create([
        //     'name' => $request->name,
        //     'skill_name'    => $request->skill,
        //     'avg_rating'    => $request->avg_rating,
        //     'total_rating'  => $request->total_rating,
        //     'description'   => $request->description,
        //     'image'         => $image,
        //     'status'        => $request->status,
        // ]);


        return response()->json([
            'status'   => "success",
            'message'  => 'saved successfully',
        ], 200);
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['title'] = "Edit designer";
        $data['route_name'] = route('admin.designer.update',$id);
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

        if(!empty($image)){
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
