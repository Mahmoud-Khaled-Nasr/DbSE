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
        $university = University::all()->find($id);
        $faculties= Faculty::where('uni_id','=',$id)->get();
        $response = [
            'university' => $university,
            'faculties' => $faculties
        ];
        return response()->json($response,200);
    }
}
