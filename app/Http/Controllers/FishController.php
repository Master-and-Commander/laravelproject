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
