<?php

namespace App\Http\Controllers;

use App\Profile;
use Auth;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return $profiles = Profile::get();
    }

    public function show($id)
    {
        return  $profile = Profile::where('user_id', $id)->first();
    }

    public function store(Request $req)
    {
        $req->validate([
        'name' => 'required',
        'gender' => 'required',
        'about' => 'required | max:255',
         ]);
        Profile::create($req->all());
       
        $user = User::where('id', $req->user_id)->first();
        $user->profile = true;
        $user->save();
        return response('Profile created successfully', 200)
                  ->header('Content-Type', 'text/plain');
    }

    public function update(Request $req, $id)
    {
        $profile = Profile::where('user_id', $id)->first();
        $profile->update($req->all());
        return $profile;
    }
}
