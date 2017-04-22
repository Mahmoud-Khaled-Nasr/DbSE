<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University;
use App\Faculty;

//TODO fix the UniversityController

/**
 * Class UniversityController
 * @package App\Http\Controllers
 */
class UniversityController extends Controller
{

    /**
    * Get all Universities.
    *The list consists of Universities Name, ID, Logo & Faculties Name, ID, Logo.
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $university=new University();
        $response=$university->getBasicUniversitiesData();
        return response()->json($response,200);
    }

    /**
     * Get Specific University by ID.
     *Each University has name, logo, pictures, description, city, contacts, website, facebook_page, location, and faculties.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $university = University::where('id','=',$id)->firstOrFail();
        $faculties= Faculty::where('university_id','=',$id)->get();
        $data=array();
        foreach ($faculties as $faculty){
            array_push($data,['id'=>$faculty->id ,'name'=>$faculty->name]);
        }
        $response = array();
        array_push($response, ['university' => $university, 'faculties' => $data]);

        return response()->json($response,200);
    }
}
