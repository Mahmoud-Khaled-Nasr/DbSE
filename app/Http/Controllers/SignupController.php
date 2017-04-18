<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    ///TODO add a validator
    public function signup(Request $request){
        $username=$request->username;
        $email=$request->email;
        $password=$request->password;
        $type=$request->type;
        if (User::isUsernameExist($username))
            return response()->json(["error"=>"username already exists"],409);
        if (User::isEmailExist($email))
            return response()->json(["error"=>"email already exists"],409);
        $user = new User();
        $user->username=$username;
        $user->email=$email;
        $user->password=bcrypt($password);
        $user->type=$type;
        $user->save();
        return response()->json(['id'=>$user->id],200);
    }
}
