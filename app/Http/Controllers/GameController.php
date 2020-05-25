<?php

namespace App\Http\Controllers;

class GameController extends Controller
{
    public function showGeneral()
    {
        return view('game');
    }
    public function showSpecific($game)
    {
        $data['game'] = $game;
        return view('gameSpecific',$data);
    }

    public function showChess()
    {
        $data['test'] = "test";
        return view('gameChess', $data);
    }
}
