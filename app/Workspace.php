<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    public function pwsos()
    {
        return $this->hasMany('App\PWSO');
    }

    public function wsos()
    {
        return $this->hasMany('App\WSO');
    }


    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot(['rate']);
    }

    public static function isWorkspaceExists($id)
    {
        if (count(Workspace::all()->find($id)) != 0)
            return true;
        else
            return false;
    }
    public function getBasicWorkspacesData(Workspace $ws)
    {
        $response =array();
        foreach ($ws as $workspace ){
            array_push($response,['name'=>$workspace->name , 'id'=>$workspace->id ,'logo'=>$workspace->logo , 'rate'=>$workspace->rate]);
        }
        return $response;
    }

    public static function rate($wsid)
    {
        $workspace= Workspace::all()->find($wsid);
        $totalSum = 0;
        $count = 0;
        foreach ($workspace->users as $user){
            $totalSum+= $user->pivot->rate;
            $count++;
        }
        return $rate=($count==0)?0:((float)$totalSum/$count);
    }

    public static function updatews($id,$request)
    {
        $ws=Workspace::all()->find($id);
        $ws->name=$request->name;
        $ws->type=$request->type;
        $ws->video=$request->video;
        $ws->contacts=$request->contacts;
        $ws->website_url=$request->website_url;
        $ws->facebook_page=$request->facebook_page;
        $ws->description=$request->description;
        $ws->classification=$request->classification;
        $ws->air_conditioning=$request->air_conditioning;
        $ws->private_rooms=$request->private_rooms;
        $ws->data_show=$request->data_show;
        $ws->wifi=$request->wifi;
        $ws->laser_cutter=$request->laser_cutter;
        $ws->printing_3D=$request->printing_3D;
        $ws->PCB_printing=$request->PCB_printing;
        $ws->girls_area=$request->girls_area;
        $ws->smoking_area=$request->smoking_area;
        $ws->cafeteria=$request->cafeteria;
        $ws->cyber=$request->cyber;
        $ws->save();
    }
}
