<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;

    public static function getUserProfile ($id){
        return User::all()->find($id)->toArray();
    }

    public static function updateUser ($id,$request){
        $user=User::all()->find($id);
        $user->username=$request->username;
        $user->email=$request->email;
        if ($request->password != "")
            $user->password=bcrypt($request->password);
        $user->save();
    }

    public static function getUserID ($datatype,$data){
        $row=User::all()->where($datatype,'=',$data)->first();
        return $row->id;
    }
    
    public static function getUserType ($datatype,$data){
        $row=User::where($datatype,$data)->firstOrFail();
        return $row->type;
    }

    public static function isEmailExist ($email){
        if (count(User::where('email','=',$email)->get()) !=0)
            return true;
        else
            return false;
    }

    public static function isUsernameExist ($username){
        if (count(User::where('username',$username)->get()) !=0 )
            return true;
        else
            return false;
    }

    public static function isUserExist ($id){
        if (count(User::all()->find($id)) != 0)
            return true;
        else
            return false;
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

    public function wso()
    {
        return $this->hasOne('App\WSO');
    }

    public function pwso()
    {
        return $this->hasOne('App\PWSO');
    }
}