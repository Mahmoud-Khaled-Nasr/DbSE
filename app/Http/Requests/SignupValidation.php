<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SignupValidation extends FormRequest
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
        $rule["email"]='required|unique:users,email';
        $rule["username"]='required|unique:users,username';
        $rule["password"]="required|min:8";
        $rule["type"]=[
            'required',
            Rule::in(["VISITOR","PWSO","WSO"])
        ];
        switch ($this->type){
            case "VISITOR":{
                $rule["name"]='required';
                $rule["gender"]=[
                    'required',
                    Rule::in(["MALE","FEMALE"])
                ];
            }
                break;
            case "PWSO":
                //TODO add check for the type of the workspace either premim or normal
                $rule["workspace_id"]='required|exists:workspaces,id';
                $rule["name"]='required';
                $rule["phone"]='required|min:11';
                break;
            case "WSO":
                $rule["workspace_id"]='required|exists:workspaces,id';
                $rule["name"]='required';
                $rule["phone"]="required|min:11";
                break;
            default:
                break;
        }
        return $rule;
    }

    public function response(array $errors)
    {
        return response()->json(["error"=>$errors],409);
    }
}
