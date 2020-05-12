<?php

namespace App\Http\Controllers;

class GameController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('game');
    }
    public function showBuddy()
    {
        $data['game'] = "hey";
        return view('game',$data);
    }
    public function showSpecific($game)
    {
        $data['game'] = $game;
        return view('gameSpecific',$data);
    }
}
