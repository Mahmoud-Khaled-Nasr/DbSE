<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ForgetPasswordValidation;

class ForgetPasswordController extends Controller
{

    public function getNewPassword (ForgetPasswordValidation $request){
        $password=str_random(9);
        $row=User::all()->where('email','=',$request->email)->first();
        $id=$row->id;
        $user=User::all()->find($id);
        $user->password=bcrypt($password);
        $user->save();
        //TODO send email to the user with the new password
        return response()->json(['msg'=>'the password has been reset and sent to the email'],200);
    }
}
