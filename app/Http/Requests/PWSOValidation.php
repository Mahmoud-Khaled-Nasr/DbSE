<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PWSOValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule=array();
        $pwsoId= $this->route('pwso');
        switch ($this->method())
        {
            case "PATCH":
            case "PUT":{
                $rule["email"]=['required',
                    Rule::unique('users','email')->ignore($pwsoId,'id')
                ];
                $rule["username"]=[
                    'required',
                    Rule::unique('users','username')->ignore($pwsoId,'id')
                ];
                $rule["password"]=['required'];
                $rule["name"]=["required"];
                $rule["phone"]=['required'];
            }
                break;
        }
        return $rule;
    }

    public function response(array $errors)
    {
        return response()->json(["error"=>$errors],409);
    }
}
