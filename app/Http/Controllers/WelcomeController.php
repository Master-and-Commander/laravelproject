<?php

namespace App\Http\Controllers;
use App\Plant;
use App\Fish;
use App\Article;
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
        
        $fishEntries = Fish::orderby('updated_at')->take(3)->get();
        $plantEntries = Plant::orderby('updated_at')->take(3)->get();
        $articleEntries = Article::orderby('updated_at')->take(5)->get();
        
        $data['fishes'] = array();
        $data['plants'] = array();
        $data['articles'] = array();
        
        foreach ($plantEntries as $entry) {
            $temp = array(0 => $entry['plant_id'], 1 => $entry['species_name'], 2 => $entry['description'] );
            array_push($data['plants'], $temp);
        }
        
        foreach ($fishEntries as $entry) {
            $temp = array(0 => $entry['fish_id'], 1 => $entry['species_name'], 2 => $entry['description'] );
            array_push($data['fishes'], $temp);
        } 
        foreach ($articleEntries as $entry) {
            $temp = array(0 => $entry['id'], 1 => $entry['title'], 2 => $entry['introduction']);
            array_push($data['articles'], $temp);
        }
        
        return view("welcome", $data);
    }

    
}
