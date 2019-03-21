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
    return view('home');
});

Route::get('/notifiche', function () {
    return view('notifiche');
});

Route::get('/segnalazioni', function () {
    return view('segnalazioni');
});

Route::get('/cerca', function () {
    return view('cerca');
});
