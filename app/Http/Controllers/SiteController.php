<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['trainers']= User::where('role',3)->limit(8)->orderBy('id','desc')
        ->withCount(['ratings as average_rating' => function($query) {
            $query->select(DB::raw('coalesce(avg(rate),0)'));
        }])
        ->get();
        return view('home',$data);
    }

    public function contactUs()
    {
        //
        return view('contact');
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
    }


    public function account()
    {
        //
        return view('account');
    }
    public function updateProfile(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update user data
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->surname = $request->surname;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
