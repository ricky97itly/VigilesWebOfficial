<?php

namespace App\Http\Controllers;

use Validator;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends ProfileController
{
  public function avatarIndex() {
    $user = Auth::user();
    return view('avatar_update')->with('user', $user);
  }

  public function avatarUpdate(Request $request) {
    // Validazione dei dati
    $validator = Validator::make($request->all(), [
      'avatar' => 'bail|required|mimes:jpg,jpeg,png,svg,ttif,gif|size:51200'
    ]);

    // Azioni conseguenti alla validazione
    if ($validator->fails()) {
      // ERRORE - Torna alla view precedente ritornando gli errori
      return back()->withErrors($validator);
    } else {
      // Creo un nome progressivo e univoco, quindi lo assegno allo user, poi salvo l'immagine nel local storage (per ora) e nel DB il nome
      $user = Auth::user();
      $avatarName = $user->id.'_avatar_'.time().'.'.request()->avatar->getClientOriginalExtension();
      $request->avatar->storeAs('avatars', $avatarName);
      $user->avatar = $avatarName;
      $user->save();
      // dd($user->avatar);
      return redirect('/profile');
    }
  }
}
