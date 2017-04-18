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
    /*public function show($id)
    {
        return "hi";
    }*/

    public function signin(Request $request){

        $email=User::where('email','=',$request->login)->get();
        $username=User::where('username','=',$request->login)->get();
        if (count($email)==1)
            $field='email';
        elseif (count($username)==1)
            $field='username';
        else
            return response()->json(['error' => 'user doesn\'t exist'], 401);

        $data=array( $field=> $request->login,'password'=> $request->password);
        //$data=array("email"=>User::all()->find(1)->email,"password"=>User::all()->find(1)->password);
        try {
            // attempt to verify the credentials and create a token for the user
            $token=JWTAuth::attempt($data);
            $token = JWTAuth::attempt($data);

            if (!$token ) {
                return response()->json(['error' => 'wrong password'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }
}
