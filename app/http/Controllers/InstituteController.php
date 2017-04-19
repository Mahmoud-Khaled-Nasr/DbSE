<?php

namespace App\Http\Controllers;

use App\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutes = Institute::all();
        $response = [
            'institutes' => $institutes
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
        $institute = Institute::where('fid','=',$id)->firstOrFail();
        $response = [
            'institute' => $institute,
        ];
        return response()->json($response,200);
    }

}
