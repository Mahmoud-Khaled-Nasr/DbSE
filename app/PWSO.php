<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PWSO extends Model
{
    protected $table='pwsos';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function workspace()
    {
        return $this->belongsTo('App\Workspace');
    }

    public static function isPWSOExists ($id){
        if (count(PWSO::all()->find($id)) != 0)
            return true;
        else
            return false;
    }
}
