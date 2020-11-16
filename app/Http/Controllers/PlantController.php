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
        // str_replace("_", " ", $name)
        $entry = Plant::where('species_name', '=', str_replace("_", " ", $name))->first();
        $data['name'] = str_replace("_", " ", $name);
        $data['common_name'] = $entry['common_name'];
        $data['species_name'] = $entry['species_name'];
        $data['family_name'] = $entry['family_name'];
        $data['habitat'] = $entry['habitat'];
        $data['humidity'] = $entry['humidity'];
        $data['pH'] = 6;
        $data['description'] = $entry['description'];

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
