<?php

namespace App\Http\Controllers;
use App\Scorpion;
use App\Spider;
use App\ScorpionBuddy;
use App\SpiderBuddy;
class WelcomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function generateMain()
    {
        // get recent additions

        $entries = Scorpion::orderby('updated_at')->get();
        $data['scorpions']  = array();
        foreach ($entries as $entry) {
            $temp = array(0 => $entry['scorpion_id'], 1 => $entry['species_name']);
            array_push($data['scorpions'], $temp);
        }
        
        return view("welcome", $data);
    }

    
}
