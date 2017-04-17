<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;


//TODO fix the class
class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();
        $response = [
            'faculties' => $faculties
        ];
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
        $faculty = Faculty::all()->find($id);
        $response = [
            'faculty' => $faculty,
        ];
        return response()->json($response,200);
    }


}
