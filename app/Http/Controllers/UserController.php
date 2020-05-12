<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user');
    }
    public function showBuddy()
    {
        $data['user'] = "hey";
        return view('user',$data);
    }
    public function showSpecific($user)
    {
        $data['user'] = $user;
        return view('userSpecific',$data);
    }
}
