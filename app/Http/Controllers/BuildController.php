<?php

namespace App\Http\Controllers;

class BuildController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('build');
    }
    public function showBuddy()
    {
        $data['build'] = "hey";
        return view('build',$data);
    }
    public function showSpecific($build)
    {
        $data['build'] = $build;
        return view('buildSpecific',$data);
    }

    public function buildSpecific($build)
    {
      $data['build'] = $build;
      return view('buildSpecific',$data);
    }
}
