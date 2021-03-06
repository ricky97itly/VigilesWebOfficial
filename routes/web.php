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

Route::get('/home', 'HomeController@index')->middleware('auth', 'verified');
Route::get('/home/{id}', 'HomeController@goToMarker')->middleware('auth', 'verified');
Route::get('/chat', 'ChatViewController@listChats')->name('chat')->middleware('auth');
Route::get('/chat-report/{report}', 'ChatViewController@messagesInReport')->name('chat-report')->middleware('auth');
Route::get('/search_result', 'SearchController@search')->middleware('auth');
Route::get('', function () {
    return redirect('/home');
});

Route::get('/avatar', 'StorageController@avatarIndex')->name('avatar')->middleware('auth');
Route::post('/avatar', 'StorageController@avatarUpdate')->name('avatar')->middleware('auth');

Route::resource('/profile', 'StorageController')->middleware('auth')->except([
  'create', 'show', 'store', 'destroy'
]);

Route::get('/reports/{report}/chat', 'ChatViewController@show')->middleware('auth');
Route::post('/reports/{report}/reply', 'ChatViewController@sendMessage')->name('send-chat-message')->middleware('auth');
Route::resource('/reports', 'ReportsController')->middleware('auth')->except([
  'create'
]);



Route::resource('/admin', 'AdminController')->middleware('auth');

//prova
