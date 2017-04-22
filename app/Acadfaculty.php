<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acadfaculty extends Model
{
    public function getBasicAcadfacultiesData()
    {
        $acadfaculties=Acadfaculty::all();
        $response =array();
        foreach ($acadfaculties as $faculty ){
            array_push($response,['name'=>$faculty->name , 'id'=>$faculty->id ,'logo'=>$faculty->logo]);
        }
        return $response;
    }
    /**
     * Get the academy that owns the faculty.
     */
    public function academy()
    {
        return $this->belongsTo('App\Academy');
    }
}
