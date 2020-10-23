<?php

namespace App\Http\Controllers;

class BuildController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // with focus simply on my own fish and plants (not for sale for now), Not sure this is needed

    public function build()
    {
      return view('buildSpecific');
    }
}
