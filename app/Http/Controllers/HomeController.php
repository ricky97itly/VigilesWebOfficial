<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GMaps;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $config['center'] = '45.4641013,9.1897378';
      $config['zoom'] = '13';
      $config['map_height'] = '84vh';
      $config['map_width'] = '100%';
      $config['scrollwheel'] = true;

      GMaps::initialize($config);

      $map = GMaps::create_map();

      return view('home')->with('map', $map);
    }
}
