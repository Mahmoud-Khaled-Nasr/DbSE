<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    public function getBasicAcademiesData (){
        $academies=Academy::all();
        $response =array ();
        $acadfaculties =array ();
        foreach ($academies as $academy ){
            $acadfaculty_table=Academy::all()->find($academy->id)->acadfaculties;
            foreach ($acadfaculty_table as $f){
                array_push($acadfaculties,['name'=>$f->fname, 'id'=>$f->fid , 'logo'=>$f->flogo]);
            }
            array_push($response,['name'=>$academy->name , 'id'=>$academy->id ,'logo'=>$academy->logo ,
                'faculties'=>$acadfaculties
            ]);
            $acadfaculties=array();

        }
        return $response;
    }

    /**
     * Get the faculties of the university.
     */
    public function acadfaculties()
    {
        return $this->hasMany('App\Acadfaculty');
    }
}
