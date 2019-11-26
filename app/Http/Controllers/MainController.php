<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Mail;

class MainController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile');
    }

    public function singleProfile(Request $request, $id)
    {
        $user = Profile::where('user_id', $id)->first();
        return view('singleProfile', compact('user'));
    }
}
