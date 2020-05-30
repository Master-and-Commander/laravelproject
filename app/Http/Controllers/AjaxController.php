<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
        $intent = $request->intent;
        $data = $request->data;
        $article = $request->article;
        return response()->json([
            'debug'=>'Data is successfully added for ' . $intent
            ]);
    }
    
}
