<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DbseController extends Controller
{
    public function about(){
        $string=json_decode(Storage::get ('dbse/about.txt'));
        //TODO add the description and website to a file
        return response()->json(['description'=>$string->description,
            'website'=>$string->website],200);
    }
}
