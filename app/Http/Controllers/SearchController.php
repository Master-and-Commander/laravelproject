<?php

namespace App\Http\Controllers;

class SearchController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function search($search)
    {
        $data['search'] = $search;
        return view('search',$data);
    }
    
}
