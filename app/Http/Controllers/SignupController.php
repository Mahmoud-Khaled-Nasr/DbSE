<?php

namespace App\Http\Controllers;

use Mail;
use View;
use App\User;
use App\Visitor;
use Illuminate\Http\Request;
use App\Http\Requests\UserValidation;
use App\Http\Requests\SignupValidation;
use Tymon\JWTAuth\Facades\JWTAuth;

class SignupController extends Controller
{
    public function signup(SignupValidation $request){
        $type=$request->type;
        $user = new User();
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->type=$type;
        $user->save();
        switch ($type){
            case "VISITOR":{
                $visitor=new Visitor();
                $visitor->name=$request->name;
                $visitor->gender=$request->gender;
                $visitor->user_id=$user->id;
                $visitor->save();
                $id=$visitor->id;
            }
                break;
            case "PWSO":
                break;
            case "WSO":
                break;
            default:
                break;
        }
        try {
            $token = JWTAuth::attempt(['username'=>$request->username,'password'=>$request->password]);

            if (!$token ) {
                return response()->json(['error' => 'wrong password'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(['msg'=>'regestered successfully','id'=>$id,'token'=>$token],200);
    }

    public function verify(UserValidation $request){
        $code=rand(111111,999999);
        //TODO send an email from here

       /* $row=User::all()->where('email','=',$request->email)->first();
        $id=$row->id;
        $user=User::all()->find($id);
       */
       $email=$request->email;
       $username=$request->username;

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
        $view = View::make('email.confirmation', [
            'message' => $code
        ]);

        $html = $view->render();

        // Send email
        $message = \Swift_Message::newInstance('DbSE app Verification step')
            ->setFrom(['no-reply@dbse.com' => 'dbse team'])
            ->setTo([$email => $username])
            // If you want plain text instead, remove the second paramter of setBody
            ->setBody($html, 'text/html');

        if($mailer->send($message)){
            return response()->json(['msg'=>'verification code was sent to the email','code'=>$code],200);
        }

        return response()->json(['error'=>'this email is not correct'],200);
    }
}
