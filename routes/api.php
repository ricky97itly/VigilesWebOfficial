<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Mostra Segnalazioni
Route::get('reports', 'ReportsAPIController@index');

// Mostra segnalazione singola
Route::get('report/{id}', 'ReportsAPIController@show');

// Crea nuova segnalazione
Route::post('report', 'ReportsAPIController@store');

// Aggiorna segnalazione
Route::put('report', 'ReportsAPIController@store');

// Cancella segnalazione
Route::delete('report/{id}', 'ReportsAPIController@destroy');

// ____________________________

// Mostra tutti gli utenti
Route::get('users', 'UsersAPIController@index');

// Mostra un utente
Route::get('user/{id}', 'UsersAPIController@show');

// Crea nuovo utente
Route::post('user', 'UsersAPIController@store');

// Aggiorna utente
Route::put('user', 'UsersAPIController@store');

// Cancella utente
Route::delete('user/{id}', 'UsersAPIController@destroy');

// ____________________________

// Per login su iOS con oauth
Route::post('login', 'LoginAPIController@store');

// Per register su iOS
Route::post('register', 'LoginAPIController@register');
