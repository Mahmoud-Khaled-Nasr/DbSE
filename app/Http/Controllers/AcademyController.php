<?php

namespace App\Http\Controllers;

use App\Academy;
use App\Acadfaculty;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academy=new Academy();
        $response=$academy->getBasicAcademiesData();
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
        $academy = Academy::where('id','=',$id)->firstOrFail();
        $acadfaculties= Acadfaculty::where('academy_id','=',$id)->get();
        $data=array();
        foreach ($acadfaculties as $faculty){
            array_push($data,['id'=>$faculty->fid ,'name'=>$faculty->fname]);
        }
        $response = array();
        array_push($response, ['academy' => $academy, 'faculties' => $data]);

        return response()->json($response,200);
    }
}
