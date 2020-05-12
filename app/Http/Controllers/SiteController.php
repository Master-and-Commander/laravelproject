<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('site');
    }
    public function showBuddy()
    {
        $data['site'] = "hey";
        return view('site',$data);
    }
    public function showSpecific($site)
    {
        $data['site'] = $site;
        return view('siteSpecific',$data);
    }
}
