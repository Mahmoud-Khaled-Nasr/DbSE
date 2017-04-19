<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University;
use App\Faculty;

//TODO fix the UniversityController

class UniversityController extends Controller
{

    /**
    * Get all universities in the database
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $university=new University();
        $response=$university->getBasicUniversitiesData();
        return response()->json($response,200);
    }

    /**
     * Get specific university by id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $university = University::where('id','=',$id)->firstOrFail();
        $faculties= Faculty::where('university_id','=',$id)->get();
        $data=array();
        foreach ($faculties as $faculty){
            array_push($data,['id'=>$faculty->fid ,'name'=>$faculty->fname]);
        }
        $response = array();
        array_push($response, ['university' => $university, 'faculties' => $data]);

        return response()->json($response,200);
    }
}
