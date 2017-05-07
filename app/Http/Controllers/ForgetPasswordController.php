<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use App\Http\Requests\ForgetPasswordValidation;
use Mail;
use View;

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


        $smtpAddress = 'smtp.gmail.com';
        $port = 465;
        $encryption = 'ssl';
        $yourEmail = 'dbseteam@gmail.com';
        $yourPassword = 'Asd123456789';

        // Prepare transport
        $transport = \Swift_SmtpTransport::newInstance($smtpAddress, $port, $encryption)
            ->setUsername($yourEmail)
            ->setPassword($yourPassword);
        $mailer = \Swift_Mailer::newInstance($transport);


        // Prepare content
        $view = View::make('email.reset-password', [
            'message' => $password
        ]);

        $html = $view->render();

        // Send email
        $message = \Swift_Message::newInstance('DbSE app Verification step')
            ->setFrom(['no-reply@dbse.com' => 'dbse team'])
            ->setTo([$email => $username])
            // If you want plain text instead, remove the second paramter of setBody
            ->setBody($html, 'text/html');

        if($mailer->send($message)){
            return response()->json(['msg'=>'the password has been reset and sent to the email'],200);
        }

        return response()->json(['error'=>'this email is not correct'],200);

    }
}
