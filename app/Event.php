<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function workspace()
    {
        return $this->belongsTo('App\Event');
    }

    public static function isEventExists($id){
        if (count(Event::all()->find($id)) != 0)
            return true;
        else
            return false;
    }
}
