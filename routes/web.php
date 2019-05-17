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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home')->middleware('auth', 'verified');
Route::get('/notifiche', 'NotificationsController@index')->name('notifiche')->middleware('auth');
Route::get('/search', 'SearchController@index')->middleware('auth');
Route::get('/search_result/{searchKey}', 'SearchController@search')->middleware('auth');

Route::get('/avatar', 'StorageController@avatarIndex')->name('avatar')->middleware('auth');
Route::post('/avatar', 'StorageController@avatarUpdate')->name('avatar')->middleware('auth');

Route::resource('/profile', 'StorageController')->middleware('auth')->except([
  'create', 'show', 'store', 'destroy'
]);

Route::resource('/reports', 'ReportsController')->middleware('auth')->except([
  'create', 'destroy'
]);

// Route::resource('/search', 'SearchController')->middleware('auth')->only([
//   'index', 'search'
// ]);;

Route::resource('/admin', 'AdminController')->middleware('auth');
