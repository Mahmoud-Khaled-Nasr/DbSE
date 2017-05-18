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

    public static function isWorkspaceExists($id){
        if (count(Workspace::all()->find($id)) != 0)
            return true;
        else
            return false;
    }
}
