<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    public function getUniversity ($id){

    }

    /**
     * Get the faculties of the university.
     */
    public function faculties()
    {
        return $this->hasMany('App\Faculty');
    }
}
