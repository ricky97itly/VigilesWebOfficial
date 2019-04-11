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

Route::get('/avatar', 'StorageController@avatarIndex')->name('avatar')->middleware('auth');
Route::post('/avatar', 'StorageController@avatarUpdate')->name('avatar');

// Route::get('/profilo', 'ProfileController@index')->name('profilo')->middleware('auth');
// Route::get('/profilo/modifica', 'ProfileController@edit')->middleware('auth');
// Route::post('/profilo/{id}', 'ProfileController@update')->middleware('auth');
// Route::delete('/profilo/{id}', 'ProfileController@destroy')->middleware('auth');

Route::resource('/profile', 'StorageController');
Route::resource('/admin', 'AdminController');
