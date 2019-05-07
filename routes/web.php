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
Route::get('/cerca', 'SearchController@index')->name('cerca')->middleware('auth');

Route::get('/avatar', 'StorageController@avatarIndex')->name('avatar')->middleware('auth');
Route::post('/avatar', 'StorageController@avatarUpdate')->name('avatar');

Route::resource('/profile', 'StorageController')->middleware('auth')->except([
  'create', 'show', 'store', 'destroy'
]);

Route::resource('/admin', 'AdminController')->middleware('auth');
Route::resource('/reports', 'ReportsController')->middleware('auth');
