<?php

namespace App\Http\Controllers;

class SpiderController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('spider');
    }
    public function showGeneral()
    {
        $data['spider'] = "hey";
        return view('spider',$data);
    }
    public function showBuddy()
    {
        $data['spider'] = "hey";
        return view('spider',$data);
    }
    public function showSpecific($spider)
    {
        $data['spider'] = $spider;
        return view('spiderSpecific',$data);
    }
}
