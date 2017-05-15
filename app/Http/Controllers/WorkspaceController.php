<?php

namespace App\Http\Controllers;

use App\Workspace;
use Illuminate\Http\Request;

/**
 * Class WorkspaceController
 * @package App\Http\Controllers
 */
class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showstates()
    {
        $states = \DB::select('SELECT DISTINCT state FROM workspaces;');
        $response = $states;
        return response()->json($response,200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showworkspaces($state)
    {
        $workspaces = Workspace::all()->where('state','=',$state);
        $response = array();
        foreach ($workspaces as $workspace ){
            array_push($response,['id'=>$workspace->id , 'name'=>$workspace->name ,'logo'=>$workspace->logo , 'rate'=>$workspace->rate]);
        }
        return response()->json($response,200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workspace = Workspace::where('id','=',$id)->firstOrFail();
        $response = [
            'workspace' => $workspace,
        ];
        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
}
