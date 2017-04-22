<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function getBasicSchoolsData()
    {
        $schools=School::all();
        $response =array();
        foreach ($schools as $school ){
            array_push($response,['name'=>$school->name , 'id'=>$school->id ,'logo'=>$school->logo]);
        }
        return $response;
    }
}
