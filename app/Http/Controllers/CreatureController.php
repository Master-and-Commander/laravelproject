<?php

namespace App\Http\Controllers;
use App\GeneralInformation;
use App\Scorpion;
use App\Spider;
class CreatureController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function generateMainArticle($type)
    {
        // fetch summary for animal
        // fetch basic facts for animal
        // fetch common questions for animal
        // fetch resources for animal
        // fetch recent articles for animal
        $data['type'] = $type;
        $data['summary'] = $data['facts'] = $data['questions'] = $data['resources'] = array();
        $summary = $facts = $questions = $resources = array();
        $entries = GeneralInformation::where('creature_type', '=', $type)->get();

        foreach ($entries as $entry) {
            switch($entry['info_type']) {
                case("summary"):
                    array_push($data['summary'], $entry['entry']);
                break;
                case("facts"):
                    $temp = array(
                        0 => $entry['entry'],
                        1 => $entry['entry_extra']);
                    array_push($data['facts'], $temp);
                     
                break;
                case("questions"):
                    $temp = array(
                        0 => $entry['entry'],
                        1 => $entry['entry_extra']);
                    array_push($data['questions'], $temp);
                break;
                case("resources"):
                    $temp = array(
                        0 => $entry['entry'],
                        1 => $entry['entry_extra']);
                    array_push($data['resources'], $temp);
                break;
            }
        }
        //$data['summary'] .= $summary;

        // pass content to view
        $data['articles'] = "articles";
        
        return view($type, $data);
    }

    public function generateTypeArticle($type, $name) {
        switch($type) {
            case("scorpion"):
                $entry = Scorpion::where('species_name', '=', str_replace("_", " ", $name))->first();
            break;
            case("spider"):
                $entry = Spider::where('species_name', '=', str_replace("_", " ", $name))->first();

        }
        // pass content to view
        $data['type'] = $type;
        $data['name'] = str_replace("_", " ", $name);
        $data['description'] = $entry['description'];
        $data['habitat'] = $entry['habitat'];
        return view($type . "Specific", $data);

    }
    
}
