<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function getBasicSchoolsData(School $sc)
    {
        //$schools=School::all();
        $response =array();
        foreach ($sc as $school ){
            array_push($response,['name'=>$school->name , 'id'=>$school->id ,'logo'=>$school->logo]);
        }
        return $response;
    }
}
