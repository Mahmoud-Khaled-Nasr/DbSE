<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WSO extends Model
{
    protected $table='wsos';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function workspace()
    {
        return $this->belongsTo('App\Workspace');
    }

    public static function isWSOExists ($id){
        if (count(WSO::all()->find($id)) != 0)
            return true;
        else
            return false;
    }
}


