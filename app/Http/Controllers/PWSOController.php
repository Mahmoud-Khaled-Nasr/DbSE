<?php

namespace App\Http\Controllers;

use App\PWSO;
use App\User;
use Illuminate\Http\Request;

class PWSOController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! PWSO::isPWSOExists($id)){
            return response()->json(["error"=>"wrong id"],409);
        }
        $res= array_merge(PWSO::all()->find($id)->toArray(), User::all()->find(PWSO::all()->find($id)->user->id)->toArray());
        return response()->json($res,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upgrade(Request $request){

    }
}
