<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use App\ArticleContent;
use App\Scorpion;
use App\Spider;
// has not recently been tested to be working
class AjaxController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function carousel($direction)
    {
        
    }

    public function carouselHandler(Request $request)
    {
        $offset = $request->offset;
        $items = $request->items;
        $direction = $request->direction;
        $offset += 1;
        return response()->json([
            'success'=>'Data is successfully added', 
            'offset' => $offset
            ]);
    }

    public function getLatinNames(Request $request) {
        $name = $request->input('entry');
        return response()->json([
            'debug'=>"debugging " . $name,
            'options'=>"<p>here's a paragraph</p>"
            ]);
    }

    public function buildSpecific(Request $request) {
        $article = $request->input('article');
        $formData = $request->input('data');
        $debug = "";
        $newArticle = new Article;
        $newScorpion = new Scorpion;

        // need to know if it's a scorpion or a spider
        // will need a table with scorpion families
        // recognized family table (family name, arthropod type ["spider", "scorpion"], description)
        
        $id = "";

        // if article exists insert article // currently working
        if( $request->input('data') == "article")
        foreach($article as $input) {
            if($input['type'] == "title") {
                $newArticle->title = $input['header'];
                $newArticle->introduction = $input['content'];
                $newArticle->save();
                $id = $newArticle->id;
            }
            else if ($input['type'] == "section") {
                $newContent = new ArticleContent;
                $newContent->article_id = $id;
                $newContent->header = $input['header'];
                $newContent->content = $input['content'];
                $newContent->step = $input['counter'];
                $newContent->save();
            }
        }
        $species_data = array();
        $typeOfArachnid = returnTypeName($formData);
        
        foreach($formData as $entry) {
            if($typeOfArachnid == "scorpion") {
                $debug .= "Scorpion: ";
                $newScorpion = scorpionDataHandler($newScorpion, $entry[0], $entry[1] );
                $debug .= "Name - " . $entry[0] . "  Value - " . $entry[1] . "\n ";
            }
            else if ($typeOfArachnid == "spider") {
                $debug .= "Spider: ";
                $newSpider = spiderDataHandler($newSpider, $entry[0], $entry[1] );
                $debug .= "Name - " . $entry[0] . "  Value - " . $entry[1] . "\n ";
            }
        }

        // re-iterate through fetched data

        
        return response()->json([
            'debug'=>$debug
            ]);
    }


    // currently not doing its job
    // perhaps best to ask question, but this shouldn't be necessary
    public function returnTypeName($data) {
        $familyname = array();
        foreach($formData as $entry) {
            if( $entry[0] == "arthropod_species_family_name") {
                $familyname = split(" ", $entry[1]);
                $debug .= "Name - " . $entry[0] . "  Value - " . $entry[1] . "\n ";
            break;
            }
        }
        
        // fetch $data
        $recognizedScorpions = array();
        $recognizedSpiders = array();
        return "scorpion";
    }

    public function scorpionDataHandler( Scorpion $scorpion, $entryname, $entrydata) {
       switch($entryname) {
           case("arthropod_species_family_name"):
            $scorpion->family_name = $entrydata;
            return $scorpion;
           case("arthropod_species_description"):
            $scorpion->description = $entrydata;
            return $scorpion;
           case("arthropod_species_habitat"):
            $scorpion->habitat = $entrydata;
            return $scorpion;
           case("arthropod_species_size"):
            $scorpion->size = $entrydata;
            return $scorpion;
           case("arthropod_species_toxicity"):
            $scorpion->toxicity = $entrydata;
            return $scorpion;
           case("arthropod_species_cannibalistic"):
            $scorpion->canibalistic = $entrydata;
            return $scorpion;
           case("arthropod_species_burrower"):
            $scorpion->burrower = $entrydata;
            return $scorpion;
           case("arthropod_species_climber"):
            $scorpion->climber = $entrydata;
            return $scorpion;
           
       }


    }

    public function spiderDataHandler(Spider $spider, $entryname, $entrydata) {
        switch($entryname) {
            case("arthropod_species_family_name"):
             $scorpion->family_name = $entrydata;
             return $scorpion;
            break;
        }
    }
    
}

   
