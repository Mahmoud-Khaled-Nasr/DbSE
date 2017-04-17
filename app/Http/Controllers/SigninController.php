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
        $data=$request->only('email','password');
        //$data=array("email"=>User::all()->find(1)->email,"password"=>User::all()->find(1)->password);
        try {
            // attempt to verify the credentials and create a token for the user
            $token=JWTAuth::attempt($data);
            $token = JWTAuth::attempt($data);

            if (!$token ) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }
}
