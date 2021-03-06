<?php

namespace App\Http\Controllers;

use Alert;
use Validator;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    // Può andare al profilo se utente
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
    // Per modificare
    $user = Auth::user();
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
    $user = User::find($id);

    // Validazione dei dati
    $validator = Validator::make($request->all(), [
      'street_number' => 'integer',
      'old_password' => 'nullable',
      'password' => 'bail|nullable|required_with:old_password|different:old_password',
      'password_confirmation' => 'bail|nullable|required_with:password|same:password'
    ]);

    // Azioni conseguenti alla validazione
    if ($validator->fails()) {
      // ERRORE - Torna alla view precedente ritornando gli errori
      return redirect('/profile/'.$user->id.'/edit')->withErrors($validator);
    } else {
      // OK - Crea un nuovo utente prendendo i dati dalla request del form profile_update
      $user->name = $request->name;
      $user->surname = $request->surname;
      $user->password = Hash::make($request->password);
      $user->address = $request->address;
      $user->street_number = $request->street_number;
      $user->avatar = $request->avatar;
    }

    // Salva utente nel DB
    $user->save();
    // Torna al profilo
    return redirect('/profile');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy()
  {

  }
}
