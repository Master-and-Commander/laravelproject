<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use App\ArticleContent;

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

    public function buildSpecific(Request $request) {
        $article = $request->input('article');
        $debug = "";
        $newArticle = new Article;
        
        $id = "";
        foreach($article as $input) {
            if($input['type'] == "title") {
                $newArticle->title = $input['header'];
                $newArticle->introduction = $input['content'];
                $newArticle->save();
                $id = $newArticle->id;
            }
            else {
                $newContent = new ArticleContent;
                $newContent->article_id = $id;
                $newContent->header = $input['header'];
                $newContent->content = $input['content'];
                $newContent->step = $input['counter'];
                $newContent->save();
            }
            $debug .= $input['content'];
        }
        return response()->json([
            'debug'=>$debug
            ]);
    }
    
}
