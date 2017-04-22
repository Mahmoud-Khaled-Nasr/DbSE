<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acadfaculty;

/**
 * Class AcadfacultyController
 * @package App\Http\Controllers
 */
class AcadfacultyController extends Controller
{
    /**
     * Get all Academies Faculties.
     *The List consists of Faculties Name, ID, Logo.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acadfaculty = new Acadfaculty();
        $response = $acadfaculty->getBasicAcadfacultiesData();
        return response()->json($response,200);
    }


    /**
     * Get Specific Academy Faculty by ID.
     *Each Faculty has name, logo, pictures, description, city, contacts, website, facebook_page, fees, location, and departments.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acadfaculty = Acadfaculty::where('id','=',$id)->firstOrFail();
        $response = [[
            'acadfaculty' => $acadfaculty,
        ]];
        return response()->json($response,200);
    }
}
