<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UniversityController extends Controller
{

    /**
    * Get all universities in the database
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //TODO fix the UniversityController  index function
        $universities = University::all();
        /*foreach ($universities as $university)
        {
            $university->faculties()->where('uni_id','=','id')->all();
        }*/
        $response = [
            'universities' => $universities
        ];
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
