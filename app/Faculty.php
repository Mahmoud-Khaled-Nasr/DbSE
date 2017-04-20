<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{

    public function getBasicFacultiesData()
    {
        $faculties=Faculty::all();
        $response =array();
        foreach ($faculties as $faculty ){
            array_push($response,['name'=>$faculty->fname , 'id'=>$faculty->fid ,'logo'=>$faculty->flogo]);
        }
        return $response;
    }
    /**
     * Get the university that owns the faculty.
     */
    public function university()
    {
        return $this->belongsTo('App\University');
    }
}
