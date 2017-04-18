<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class SigninController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function signin(Request $request){
        $login=$request->login;
        $email=User::where('email','=',$login)->get();
        $username=User::where('username','=',$login)->get();
        if (count($email)==1)
            $field='email';
        elseif (count($username)==1)
            $field='username';
        else
            return response()->json(['error' => 'user doesn\'t exist'], 401);

        $data=array( $field=> $login,'password'=> $request->password);
        try {
            $token = JWTAuth::attempt($data);

            if (!$token ) {
                return response()->json(['error' => 'wrong password'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $type=User::getUserType($field,$login);
        $id=User::getUserID($field,$login);
        return response()->json(compact('token','id','type'));
    }
}
