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
        $data['fishdata'] = array();
        $temp = array(0 => $entry['species_name'], 1 => $entry['family_name'], 2 => $entry['description'], 3 => $entry['common_name'], 4 => $entry['habitat']
    ,  5 => $entry['pH'],  6 => $entry['oxygen'],  7 => $entry['temperature'],  8 => $entry['water_type']);
        array_push($data['fishdata'], $temp);
        $data['pH'] = $entry['pH'];
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
