<?php

namespace App\Http\Controllers;

class BuildController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function build($build)
    {
      $data['build'] = $build;
      return view('buildSpecific',$data);
    }
}
