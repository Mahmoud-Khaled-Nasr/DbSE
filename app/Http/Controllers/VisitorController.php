<?php

namespace App\Http\Controllers;

use App\User;
use App\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=$request->id;
        if (User::isUserExist($id))
            return response()->json(["error"=>'user doesn\'t esists',409]);
        $visitor=new Visitor();
        $visitor->name=$request->name;
        $visitor->user_id=$id;
        $visitor->save();
        return response(["msg"=>"visitor created sucessfully"],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Visitor::isVisitorExists($id))
            return response()->json(["error"=>"wrong id"],404);
        return response()->json(Visitor::getVisitorProfile($id),200);
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
        $userid=$request->user_id;
        if (! Visitor::isVisitorExists($id))
            return response()->json(["error"=>"wrong visitor id"],404);
        if (! User::isUserExist($userid))
            return response()->json(["error"=>'user doesn\'t esists'],409);
        Visitor::updateVisitorProfile($id,$request);
        //TODO update user function with validation
        return response(["msg"=>"updated successfully"],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO is this function is needed
    }
}
