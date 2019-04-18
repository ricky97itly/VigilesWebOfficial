<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Hash;

class UsersAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Prende 10 segnalazioni
        $users = User::paginate(10);

        // Restituisce collection segnalazioni come Resource
        return UserResource::collection($users);
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
      $user = $request->isMethod('put') ? User::findOrFail($request->user_id) : new User;

      $user->id = $request->input('user_id');
      $user->name = $request->input('name');
      $user->surname = $request->input('surname');
      $user->email = $request->input('email');
      $user->password = Hash::make($request->input('password'));
      $user->address = $request->input('address');
      $user->street_number = $request->input('street_number');
      $user->avatar = $request->input('avatar');
      $user->is_admin = $request->input('is_admin');

      if($user->save()) {
        return new UserResource($user);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // Prendo una singola segnalazione
      $user = User::findOrFail($id);

      // Ritorno la segnalazione singola come resource
      return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Prendo una singola segnalazione
      $user = User::findOrFail($id);

      // Ritorno la segnalazione appena cancellata come resource
      if($user->delete()) {
        return new UserResource($user);
      }
    }
}
