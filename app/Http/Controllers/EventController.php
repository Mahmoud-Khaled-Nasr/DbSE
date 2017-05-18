<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventValidation;
use App\Workspace;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function showEvents($workspaceId){
        if (! Workspace::isWorkspaceExists($workspaceId))
           return response()->json(['error'=>'id doesnot exists'],409);
        $events=Workspace::all()->find($workspaceId)->events;
        $res=array();
        foreach ($events as $event){
            array_push($res,$event->toArray());
        }
        return response()->json($res);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventValidation $request)
    {
        if (! Workspace::isWorkspaceExists($request->workspace_id) )
            return response()->json(['error'=>'id doesnot exist'],409);
        $event=new Event();
        $event->name=$request->name;
        $event->workspace_id=$request->workspace_id;
        $event->description=$request->description;
        $event->address=$request->address;
        $event->save();
        return response()->json(["msg"=>"created successfully","event_id"=>$event->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Event::isEventExists($id))
            return response()->json(['error'=>'id doesnot exist'],409);
        $res=Event::all()->find($id)->toArray();
        return response()->json($res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventValidation $request, $id)
    {
        if (! Event::isEventExists($id))
            return response()->json(['error'=>'id doesnot exist'],409);
        $event=Event::all()->find($id);
        $event->name=$request->name;
        $event->description=$request->description;
        $event->address=$request->address;
        $event->save();
        return response()->json(["msg"=>"updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Event::isEventExists($id))
            return response()->json(['error'=>'id doesnot exist'],409);
        Event::destroy($id);
        return response()->json(['msg'=>'deleted successfully']);
    }
}
