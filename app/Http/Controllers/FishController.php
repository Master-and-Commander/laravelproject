<?php

namespace App\Http\Controllers;
use App\GeneralInformation;
use App\Fish;

class FishController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function generateFish($name) {        
        // pass content to view
        $entry = Fish::where('species_name', '=', str_replace("_", " ", $name))->first();
        $data['name'] = str_replace("_", " ", $name);
        return view("fish", $data);
    }
    
}
