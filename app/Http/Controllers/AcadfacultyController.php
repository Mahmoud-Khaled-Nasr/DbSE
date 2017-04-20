<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acadfaculty;

class AcadfacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acadfaculty = new Acadfaculty();
        $response = $acadfaculty->getBasicAcadfacultiesData();
        return response()->json($response,200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acadfaculty = Acadfaculty::where('id','=',$id)->firstOrFail();
        $response = [[
            'faculty' => $acadfaculty,
        ]];
        return response()->json($response,200);
    }
}
