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
        $entry = Fish::where('species_name', '=', $name)->first();
        $data['name'] = str_replace("_", " ", $name);        
        $data['pH'] = $entry['pH'];
        $data['oxygen'] = $entry['oxygen'];
        $data['species_name'] = $entry['species_name'];
        $data['family_name'] = $entry['family_name'];
        $data['description'] = $entry['description'];
        $data['temperature'] = $entry['temperature'];
        $data['water_type'] = $entry['water_type'];
        $data['food_type'] = $entry['food_type'];
        $data['harvest_size'] = $entry['harvest_size'];
        $data['habitat'] = $entry['habitat'];
        $data['common_name'] = $entry['common_name'];
        return view("fish", $data);
    }


    public function general(){
        $fishEntries = Fish::paginate(15);
        $data['fishes'] = array();
        foreach ($fishEntries as $entry) {
            $temp = array(0 => $entry['common_name'], 1 => $entry['family_name'], 2 => $entry['description'] );
            array_push($data['fishes'], $temp);
        }
        


        return view("fishGeneral", $data);
    }
    
}
