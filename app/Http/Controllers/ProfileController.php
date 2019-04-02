<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $user = Auth::user();
    return view('profile')->with('user', $user);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user = User::find($id);
    return view('profile_update')->with('user', $user);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    // Trova il vecchio utente per confrontarlo col nuovo
    $old_user = User::find($id);
    // Crea un nuovo utente prendendo i dati dalla request del form profile_update
    $user->name = $request->name;
    $user->surname = $request->surname;
    $user->address = $request->address;
    $user->street_number = $request->street_number;
    // Controlli sulle password: i 3 campi devono essere inseriti (diversi da null), la password e la conferma password devono essere uguali e la vecchia password dev'essere uguale a quella precedentemente salvata nel DB (Si fa con Hash::check($nuova, $vecchia)).
    if($request->password != null && $request->password_confirmation != null && $request->old_password != null && $request->password === $request->password_confirmation && Hash::check($request->password, $request->old_password)) {
      $user->password = $request->password;
    }

    $user->save();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

  }
}
