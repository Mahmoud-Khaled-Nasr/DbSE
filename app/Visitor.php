<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Visitor extends Model
{
    public static function isVisitorExists ($id){
        if (count(Visitor::all()->find($id)) != 0)
            return true;
        else
            return false;
    }

    public static function getVisitorProfile ($id){
        return Visitor::all()->find($id)->toArray();
    }

    public static function updateVisitorProfile ($id,$request){
        $visitor=Visitor::all()->find($id);
        $visitor->name=$request->name;
        $visitor->gender=$request->gender;
        $visitor->save();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
