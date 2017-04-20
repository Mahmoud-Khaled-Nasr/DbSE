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
        $institute = new Institute();
        $response = $institute->getBasicInstitutesData();
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
        $institute = Institute::where('id','=',$id)->firstOrFail();
        $response = [
            'institute' => $institute,
        ];
        return response()->json($response,200);
    }

}
