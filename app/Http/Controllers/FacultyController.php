<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;


//TODO fix the class: return specific faculty data (name,photo) in index function
class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculty = new Faculty();
        $response = $faculty->getBasicFacultiesData();
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
        $faculty = Faculty::where('fid','=',$id)->firstOrFail();
        $response = [
            'faculty' => $faculty,
        ];
        return response()->json($response,200);
    }


}
