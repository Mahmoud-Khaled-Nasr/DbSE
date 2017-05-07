<?php

namespace App\Http\Controllers;

use App\PWSO;
use App\Mailer;
use App\Workspace;
use Illuminate\Http\Request;
use View;
use App\User;
use App\Visitor;
use App\Http\Requests\UserValidation;
use App\Http\Requests\SignupValidation;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class SignupController
 * @package App\Http\Controllers
 * @inherit App\Http\Controller
 */
class SignupController extends Controller
{
    /**
     * Creates a new user and fill proper tables in the database
     *
     * The new user credentials are inserted into the user table and according to the
     * type of user(VISITOR,WSO,PWSO) the table is filled with the extra data.
     *
     * @param SignupValidation $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
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
                $pwso=new PWSO();
                $pwso->name=$request->name;
                $pwso->phone=$request->phone;
                $pwso->user_id=$user->id;
                $pwso->workspace_id=$request->workspace_id;
                $pwso->save();
                $id=$pwso->id;
                break;
            case "WSO":
                $wso=new WSO();
                $wso->name=$request->name;
                $wso->phone=$request->phone;
                $wso->user_id=$user->id;
                $wso->workspace_id=$request->workspace_id;
                $wso->save();
                $id=$wso->id;
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
        return response()->json(['msg'=>'registered successfully','id'=>$id,'token'=>$token],200);
    }

    /**
     * @param UserValidation $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(UserValidation $request){
        $code=rand(111111,999999);
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

        return response()->json(['error'=>'this email is not correct'],404);
    }

    public function verifyWorkspace (Request $request){
        //TODO send email here to this email
        $workspaceEmail=Workspace::all()->find($request->workspace_id)->toArray();
        $workspaceEmail=$workspaceEmail['email'];

    }
}
