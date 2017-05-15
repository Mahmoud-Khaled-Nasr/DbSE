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

    public function getBasicWorkspacesData(Workspace $ws)
    {
        $response =array();
        foreach ($ws as $workspace ){
            array_push($response,['name'=>$workspace->name , 'id'=>$workspace->id ,'logo'=>$workspace->logo , 'rate'=>$workspace->rate]);
        }
        return $response;
    }
}
