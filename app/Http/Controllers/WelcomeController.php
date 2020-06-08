<?php

namespace App\Http\Controllers;
use App\Scorpion;
use App\Spider;
use App\ScorpionBuddy;
use App\SpiderBuddy;
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

        $scorpionEntries = Scorpion::orderby('updated_at')->take(3)->get();
        $spiderEntries = Spider::orderby('updated_at')->take(3)->get();
        $spiderBuddyEntries = SpiderBuddy::orderby('updated_at')->take(3)->get();
        $scorpionBuddyEntries = ScorpionBuddy::orderby('updated_at')->take(3)->get();
        $articleEntries = Article::orderby('updated_at')->take(5)->get();

        $data['articles'] = array();
        $data['creatures'] = array();
        $data['buddies'] = array();
        
        foreach ($scorpionEntries as $entry) {
            $temp = array(0 => $entry['scorpion_id'], 1 => $entry['species_name'], 2 => $entry['description'] );
            array_push($data['creatures'], $temp);
        }
        foreach ($spiderEntries as $entry) {
            $temp = array(0 => $entry['spider_id'], 1 => $entry['species_name'], 2 => $entry['description'] );
            array_push($data['creatures'], $temp);
        }
        foreach ($spiderBuddyEntries as $entry) {
            $temp = array(0 => $entry['spiderbuddy_id'], 1 => $entry['buddy_name'], 2 => $entry['description']);
            array_push($data['buddies'], $temp);
        }
        foreach ($scorpionBuddyEntries as $entry) {
            $temp = array(0 => $entry['scorpionbuddy_id'], 1 => $entry['buddy_name'], 2 => $entry['description']);
            array_push($data['buddies'], $temp);
        }
        foreach ($articleEntries as $entry) {
            $temp = array(0 => $entry['id'], 1 => $entry['title'], 2 => $entry['introduction']);
            array_push($data['articles'], $temp);
        }
        
        return view("welcome", $data);
    }

    
}
