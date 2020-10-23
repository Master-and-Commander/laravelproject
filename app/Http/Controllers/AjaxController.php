<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use App\ArticleContent;
use App\Plant;
use App\Fish;
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
        $debug = "";
        $newArticle = new Article;

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
        
        // re-iterate through fetched data

        
        return response()->json([
            'debug'=>$debug
            ]);
    }


    
}

   
