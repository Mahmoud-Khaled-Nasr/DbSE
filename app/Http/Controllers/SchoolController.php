<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class SchoolController
 * @package App\Http\Controllers
 */
class SchoolController extends Controller
{
    /**
     * @param string $city
     * @return \Illuminate\Http\Response
     */
    public function showschools($city)
    {
        $schools = School::all()->where('city','=',$city);
        $response = array();
        foreach ($schools as $school ){
        array_push($response,['id'=>$school->id , 'name'=>$school->name ,'logo'=>$school->logo]);
    }
        return response()->json($response,200);
    }


    /**
     * Get Specific School by ID.
     *Each School has name, logo, classification(languages, international, etc), website, facebook_page, city, contacts, fees, location, and description.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::where('id','=',$id)->firstOrFail();
        $response = [
            'school' => $school,
        ];
        return response()->json($response,200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ShowCities()
    {
        $cities = DB::select('SELECT DISTINCT city FROM schools;');
        $response = $cities;
        return response()->json($response,200);
    }

}
