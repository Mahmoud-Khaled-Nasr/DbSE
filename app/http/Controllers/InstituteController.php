<?php

namespace App\Http\Controllers;

use App\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    /**
     * Get all Institutes.
     *List has Institutes Name, ID, Logo, Departments.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institute = new Institute();
        $response = $institute->getBasicInstitutesData();
        return response()->json($response,200);
    }


    /**
     * Get Specific Institute by ID.
     *Each Institute has name, description, city, contacts, website, facebook_page, fees, location, and departments.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institute = Institute::where('id','=',$id)->firstOrFail();
        $response = [[
            'institute' => $institute,
        ]];
        return response()->json($response,200);
    }

}
