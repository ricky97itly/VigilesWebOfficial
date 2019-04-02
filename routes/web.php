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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/notifiche', 'NotificationsController@index')->name('notifiche')->middleware('auth');
Route::get('/segnalazioni', 'ReportsController@index')->name('segnalazioni')->middleware('auth');
Route::get('/cerca', 'SearchController@index')->name('cerca')->middleware('auth');
Route::get('/profilo', 'ProfileController@index')->name('profilo')->middleware('auth');
Route::get('/profilo/{id}/modifica', 'ProfileController@edit')->middleware('auth');
Route::post('/profilo/{id}', 'ProfileController@update')->middleware('auth');
// Route::resource('/profilo/{id}/modifica', 'ProfileController')->middleware('auth');
