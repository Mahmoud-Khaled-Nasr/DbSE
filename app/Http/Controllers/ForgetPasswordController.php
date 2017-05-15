<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use App\Http\Requests\ForgetPasswordValidation;
use Mail;
use View;
use App\Mailer;

class ForgetPasswordController extends Controller
{

    public function getNewPassword (ForgetPasswordValidation $request){
        $password=str_random(9);
        $row=User::where('email','=',$request->email)->first();
        $id=$row->id;
        $user=User::all()->find($id);
        $user->password=bcrypt($password);
        $user->save();

        $email = $request->email;
        $username = $user->username;
        //TODO send email to the user with the new password


        $messag= new Mailer('email.reset-password', $password,'DbSE app Reset Password', $email, $username);
        $messag->sendMail('the password has been reset and sent to the email');

    }

}
