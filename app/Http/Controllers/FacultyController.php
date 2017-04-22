<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;


//TODO fix the class: return specific faculty data (name,photo) in index function
/**
 * Class FacultyController
 * @package App\Http\Controllers
 */
class FacultyController extends Controller
{
    /**
     * Get all Universities Faculties.
     *Faculty has Name, ID, Logo.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculty = new Faculty();
        $response = $faculty->getBasicFacultiesData();
        return response()->json($response,200);
    }


    /**
     * Get Specific University Faculty by ID.
     *Each Faculty has name, logo, pictures, description, city, contacts, website, facebook_page, fees(if University type=private), location, and departments.
     * @param  int  $id
     * @return \Illuminate\Http\Response Faculty in form of [string name, int id, float fees, string contacts, string description, string website, string facebook_page, string departments, string logo, string pic1, string pic2, double x, double y, string location]
     */
    public function show($id)
    {
        $faculty = Faculty::where('id','=',$id)->firstOrFail();
        $response = [[
            'faculty' => $faculty,
        ]];
        return response()->json($response,200);
    }


}
