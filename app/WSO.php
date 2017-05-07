<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WSO extends Model
{
    protected $table='wsos';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function workspace()
    {
        return $this->belongsTo('App\Workspace');
    }
}


