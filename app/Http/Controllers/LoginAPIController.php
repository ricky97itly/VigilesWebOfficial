<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Validator;
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

    /**
    * Register api
    *
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'address' => 'required',
            'street_number' => 'required',
            'is_admin' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus);
    }


}
