<?php

namespace App\Http\Controllers;

class SetupController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('setup');
    }
    public function showBuddy()
    {
        $data['setup'] = "hey";
        return view('setup',$data);
    }
    public function showSpecific($setup)
    {
        $data['setup'] = $setup;
        return view('setupSpecific',$data);
    }
}
