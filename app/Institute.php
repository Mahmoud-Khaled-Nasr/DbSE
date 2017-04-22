<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    public function getBasicInstitutesData()
    {
        $institutes=Institute::all();
        $response =array();
        foreach ($institutes as $institute ){
            array_push($response,['name'=>$institute->name , 'id'=>$institute->id, 'departments'=>$institute->departments]);
        }
        return $response;
    }
}
