<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $profiles = $this->internalRequest('/api/profiles', 'GET')->data;
        return view('profile.index', compact('profiles'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('profile.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $profilesRequest = $this->internalRequest('/api/profiles', 'POST', $request->post());
        if(isset($profilesRequest->errors)){
            return redirect()->back()->withErrors($profilesRequest->errors);
        }
        return redirect()->route('profiles.index')->with('success','Profile has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Profile  $profile
    * @return \Illuminate\Http\Response
    */
    public function show(Profile $profile)
    {
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Profile  $profile
    * @return \Illuminate\Http\Response
    */
    public function edit(Profile $profile)
    {
        return view('profile.edit',compact('profile'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Profile  $profile
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Profile $profile)
    {
        $profilesRequest = $this->internalRequest('/api/profiles/'.$profile->id_profile, 'PUT', $request->post());
        if(isset($profilesRequest->errors)){
            return redirect()->back()->withErrors($profilesRequest->errors);
        }
        return redirect()->route('profiles.index')->with('success','Profile has been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Profile  $profile
    * @return \Illuminate\Http\Response
    */
    public function destroy(Profile $profile)
    {
        $profilesRequest = $this->internalRequest('/api/profiles/'.$profile->id_profile, 'DELETE');
        if(isset($profilesRequest->errors)){
            return redirect()->route('profiles.index')->with('error','The specified Profile could not be deleted. Try again later.');
        }
        return redirect()->route('profiles.index')->with('success','Profile has been deleted successfully');
    }

}
