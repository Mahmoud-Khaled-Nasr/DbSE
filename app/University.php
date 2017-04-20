<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{

    public function getBasicUniversitiesData (){
        $universities=University::all();
        $response =array ();
        $faculties =array ();
        foreach ($universities as $university ){
            $faculty_table=University::all()->find($university->id)->faculties;
            foreach ($faculty_table as $f){
                array_push($faculties,['name'=>$f->name, 'id'=>$f->id , 'logo'=>$f->logo]);
            }
            array_push($response,['name'=>$university->name , 'id'=>$university->id ,'logo'=>$university->logo,
                'faculties'=>$faculties
            ]);
            $faculties=array();

        }
        return $response;
    }

    /**
     * Get the faculties of the university.
     */
    public function faculties()
    {
        return $this->hasMany('App\Faculty');
    }
}
