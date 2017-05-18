<?php

namespace App\Http\Requests;

use App\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventValidation extends FormRequest
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
        $eventId= $this->route('event');
        switch ($this->method())
        {
            case "PATCH":
            case "PUT": {
                $rule["name"] = ['required'];
                $rule["description"] = ['required'];
                $rule["address"] = ["required"];
            }
                break;
            case "POST": {
                $rule["name"] = ['required'];
                $rule["description"] = ['required'];
                $rule["address"] = ["required"];
                $rule["workspace_id"]=["required"];
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
