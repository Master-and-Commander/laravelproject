<?php

namespace App\Http\Controllers;
use App\GeneralInformation;
use App\Plant;

class PlantController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    
    

    public function generatePlant($name) {
        
        // pass content to view
        $entry = Plant::where('species_name', '=', str_replace("_", " ", $name))->first();
        $data['name'] = str_replace("_", " ", $name);
        return view("plant", $data);

    }

    public function general() {
        $plantEntries = Plant::paginate(15);
        $data['plants'] = array();
        foreach ($plantEntries as $entry) {
            $temp = array(0 => $entry['common_name'], 1 => $entry['family_name'], 2 => $entry['description'] );
            array_push($data['plants'], $temp);
        }
        


        return view("plantGeneral", $data);
    }
    
}
