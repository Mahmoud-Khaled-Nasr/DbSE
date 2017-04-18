<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
    public static function getUserID ($datatype,$data){
        $row=User::where($datatype,'=',$data)->firstOrFail();
        $id=$row->id;
        $type=$row->type;
        if ($type=='VISITOR'){
            $visitor=User::all()->find($id)->first()->id;
            return $visitor;
        }elseif ($type=='WSO'){
            $wse=User::all()->find($id)->wso->first()->id;
            return $wse[0]->id;
        }else{
            $pwso=User::all()->find($id)->pwso->first()->id;
            return $pwso[0]->id;
        }
    }
    public static function getUserType ($datatype,$data){
        $row=User::where($datatype,$data)->firstOrFail();
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
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function visitor()
    {
        return $this->hasOne('App\Visitor');
    }
}