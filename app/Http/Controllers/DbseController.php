<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DbseController extends Controller
{
    public function about(){

        //TODO add the description and website to a file
        return response()->json(['description'=>'This is a simple description i will fill the real description later',
            'website'=>'http://www.dbse.co/'],200);
    }
}
