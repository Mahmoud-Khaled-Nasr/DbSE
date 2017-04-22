<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school = new School();
        $response = $school->getBasicSchoolsData();
        return response()->json($response,200);
    }


    /**
     * Get Specific School by ID.
     *Each School has name, logo, classification(languages, international, etc), website, facebook_page, city, contacts, fees, location, and description.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::where('id','=',$id)->firstOrFail();
        $response = [[
            'school' => $school,
        ]];
        return response()->json($response,200);
    }

}
