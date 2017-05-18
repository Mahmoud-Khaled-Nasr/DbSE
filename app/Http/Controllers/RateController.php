<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalUserWorkspaceValidation;
use App\Http\Requests\UserWorkspaceValidation;
use App\PWSO;
use App\User;
use App\Visitor;
use App\Workspace;
use App\WSO;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function getRate ($workspace_id){
        $workspace= Workspace::all()->find($workspace_id);
        $totalSum = 0;
        $count = 0;
        foreach ($workspace->users as $user){
             $totalSum+= $user->pivot->rate;
             $count++;
        }
        return response()->json(['rate'=>(float)$totalSum/$count ]);
    }

    public function updateRate (UserWorkspaceValidation $request){
        $workspace_id=$request->workspace_id;
        //note the id is from Visitor, PWSO or WSO
        $id=$request->id;
        $user_id=0;
        $type=$request->type;
        if (! Workspace::isWorkspaceExists($workspace_id))
            return response()->json(['error'=>'wrong workspace id']);
        switch ($type){
            case 'VISITOR':
                if (! Visitor::isVisitorExists($id))
                    return response()->json(['error'=>'wrong user id']);
                $user_id=Visitor::all()->find($id)->user->id;
                break;
            case 'PWSO':
                if (! PWSO::isPWSOExists($id))
                    return response()->json(['error'=>'wrong user id']);
                $user_id=PWSO::all()->find($id)->user->id;
                break;
            case 'WSO':
                if (! WSO::isWSOExists($id))
                    return response()->json(['error'=>'wrong user id']);
                $user_id=WSO::all()->find($id)->user->id;
                break;
        }
        $temp=User::all()->find($user_id)->workspaces->find($workspace_id)->pivot;
        if ($temp==null){
            $user=User::all()->find($user_id);
            $user->workspaces()->attach($workspace_id,['rate'=> $request->rate ]) ;
            return response()->json(['msg'=>'rated successfully'],200);
        }else{
            $users=User::all()->find($user_id);
            foreach ($users->workspaces as $work){
                if ($work->id == $workspace_id) {
                    $work->pivot->rate = $request->rate;
                    $work->pivot->save();
                }
            }
        }
        return response()->json(['msg'=>'rated successfully']);
    }

    public function personalRate(PersonalUserWorkspaceValidation $request){
        $workspace_id=$request->workspace_id;
        //note the id is from Visitor, PWSO or WSO
        $id=$request->id;
        $user_id=0;
        $type=$request->type;
        if (! Workspace::isWorkspaceExists($workspace_id))
            return response()->json(['error'=>'wrong workspace id']);
        switch ($type){
            case 'VISITOR':
                if (! Visitor::isVisitorExists($id))
                    return response()->json(['error'=>'wrong user id']);
                $user_id=Visitor::all()->find($id)->user->id;
                break;
            case 'PWSO':
                if (! PWSO::isPWSOExists($id))
                    return response()->json(['error'=>'wrong user id']);
                $user_id=PWSO::all()->find($id)->user->id;
                break;
            case 'WSO':
                if (! WSO::isWSOExists($id))
                    return response()->json(['error'=>'wrong user id']);
                $user_id=WSO::all()->find($id)->user->id;
                break;
        }
        $temp=User::all()->find($user_id)->workspaces->find($workspace_id)->pivot;
        if ($temp==null){
            return response()->json(['error'=>'there is no rating to get']);
        }else{
            $users=User::all()->find($user_id);
            foreach ($users->workspaces as $work){
                if ($work->id == $workspace_id) {
                    return response()->json(['rate'=>$work->pivot->rate]);
                }
            }
        }
    }
}
