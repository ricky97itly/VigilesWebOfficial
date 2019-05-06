<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginAPIController extends Controller
{
    public $successStatus = 200;

    /**
    *login API
    *@param  \Illuminate\Http\Request  $request
    *@return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['id'] = $user->id;
            $success['name'] = $user->name;
            $success['surname'] = $user->surname;
            $success['email'] = $user->email;
            $success['address'] = $user->address;
            $success['street_number'] = $user->street_number;
            $success['avatar'] = $user->avatar;
            $success['is_admin'] = $user->is_admin;

            return response()->json(['success'=>$success], $this-> successStatus);
        }
        else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
}
