<?php
namespace App\Http\Controllers;
use App\PWSO;
use App\User;
use App\Visitor;
use App\Workspace;
use App\WSO;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * Class SigninController
 * @package App\Http\Controllers
 */
class SigninController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
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
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $type=User::getUserType($field,$login);
        $userid=User::getUserID($field,$login);
        switch ($type){
            case "VISITOR":{
                $id=User::all()->find($userid)->visitor->id;
                return response()->json(compact('token','id','type'));
            }
            break;
            case "WSO":{
                $id=User::all()->find($userid)->wso->id;
                $workspaceId=WSO::all()->find($id)->workspace->id;
                return response()->json(compact('token','id','type','workspaceId'));
            }
            break;
            case "PWSO":{
                $id=User::all()->find($userid)->pwso->id;
                $workspaceId=PWSO::all()->find($id)->workspace->id;
                return response()->json(compact('token','id','type','workspaceId'));
            }
            break;
        }

    }
}