<?php

namespace App\Http\Controllers;

class ScorpionController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('scorpion');
    }
    public function showBuddy()
    {
        $data['scorpion'] = "hey";
        return view('scorpion',$data);
    }
    public function showSpecific($scorpion)
    {
        $data['scorpion'] = $scorpion;
        return view('scorpionSpecific',$data);
    }
}
