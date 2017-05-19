<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitorValidation;
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
            return response()->json(["error"=>"wrong id"],409);
        $res= array_merge(Visitor::getVisitorProfile($id),
            User::getUserProfile(Visitor::all()->find($id)->user->id));
        return response()->json($res,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VisitorValidation|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(VisitorValidation $request, $id)
    {
        Visitor::updateVisitorProfile($id,$request);
        User::updateUser(Visitor::all()->find($id)->user->id,$request);
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
        //TODO is this function is needed ?
    }
}
