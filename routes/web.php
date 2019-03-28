<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $config['center'] = '45.4641013,9.1897378';
    $config['zoom'] = '13';
    $config['map_height'] = '84vh';
    $config['map_width'] = '100%';
    $config['scrollwheel'] = true;

    GMaps::initialize($config);

    $map = GMaps::create_map();

    return view('home')->with('map', $map);
});

Route::get('/notifiche', function () {
    return view('notifications');
});

Route::get('/segnalazioni', function () {
    return view('reports');
});

Route::get('/cerca', function () {
    return view('search');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
