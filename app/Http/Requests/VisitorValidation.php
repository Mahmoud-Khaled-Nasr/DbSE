<?php

namespace App\Http\Requests;

use App\User;
use App\Visitor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VisitorValidation extends FormRequest
{
    private $validUser=true;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->validUser;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $visitorid=$this->route('visitor');
        if (Visitor::all()->find($visitorid) ==null) {
            $this->validUser = false;
            return [];
        }
        $userId=Visitor::all()->find($visitorid)->user->id;
        $rule=array();

        switch ($this->method())
        {
            case "PATCH":
            case "PUT":{
                $rule["email"]=['required',
                    Rule::unique('users','email')->ignore($userId,'id')
                ];
                $rule["username"]=[
                    'required',
                    Rule::unique('users','username')->ignore($userId,'id')
                ];
                $rule["password"]=["required"];
                $rule["name"]=["required"];
                $rule["gender"]=[
                    'required',
                    Rule::in(["MALE","FEMALE"])
                ];
            }
            break;


        }
        return $rule;
    }

    public function response(array $errors)
    {
        /*$var=array();
        foreach ($errors as $error){
            array_push($var,$error);
        }
        $stop=0;*/
        return response()->json(["error"=>$errors],409);
    }

    public function failedAuthorization (){
        //TODO throw an exception here
        return response()->json(["error"=>"unauthorizied action",422]);
    }

}
