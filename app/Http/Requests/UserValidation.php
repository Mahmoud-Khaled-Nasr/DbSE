<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidation extends FormRequest
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
        return [
            'username'=>'required|unique:users,username',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:8'
        ];
    }

    public function response(array $errors)
    {
        return response()->json(["error"=>$errors],409);
    }
}
