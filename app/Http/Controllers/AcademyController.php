<?php

namespace App\Http\Controllers;

use App\Academy;
use App\Acadfaculty;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    /**
     * Get all Academies.
     *The List consists of Academies Name, ID, Logo & Faculties Name, ID, Logo.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academy=new Academy();
        $response=$academy->getBasicAcademiesData();
        return response()->json($response,200);
    }


    /**
     * Get Specific Academy by ID.
     *Each Academy has name, logo, pictures, description, city, contacts, website, facebook_page, location, and faculties.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $academy = Academy::where('id','=',$id)->firstOrFail();
        $acadfaculties= Acadfaculty::where('academy_id','=',$id)->get();
        $data=array();
        foreach ($acadfaculties as $faculty){
            array_push($data,['id'=>$faculty->id ,'name'=>$faculty->name]);
        }
        $response = array();
        array_push($response, ['academy' => $academy, 'faculties' => $data]);

        return response()->json($response,200);
    }
}
