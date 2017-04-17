<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{

    /**
     * Get the university that owns the faculty.
     */
    public function university()
    {
        return $this->belongsTo('App\University');
    }
}
