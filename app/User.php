<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public static function getUserID ($datatype,$data){
        $row=User::where($datatype,'=',$data)->first();
        return $row->id;
    }

    public static function getUserType ($datatype,$data){
        $row=User::where($datatype,$data)->first();
        return $row->type;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function visitors()
    {
        return $this->hasMany('App\Visitor');
    }
}
