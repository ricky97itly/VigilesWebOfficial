<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

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
      // Mettere sta roba nel .env
      // $config['center'] = '45.4641013,9.1897378';
      // $config['zoom'] = '13';
      // $config['map_height'] = '84vh';
      // $config['map_width'] = '100%';
      // $config['scrollwheel'] = true;
      //
      // GMaps::initialize($config);
      //
      // $map = GMaps::create_map();

      // Mapper::map(45.4641013, 9.1897378);
      Mapper::map(53.381128999999990000, -1.470085000000040000);

      return view('home');
    }
}
