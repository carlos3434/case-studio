<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'       => 'required|string:tipos_documentos,id',
            'email'      => 'required|email|unique:users,email,'. (isset($this->user->id) ? $this->user->id : 0),
            'password'   => 'min:6',

            'user_id' => 'integer' ,
            'name_prefix' => 'string|max:5' ,
            'first_name' => 'string' ,
            'middle_initial' => 'string' ,
            'last_name' => 'string' ,
            'gender' => 'string|in:F,M',
            'fathers_name' => 'string' ,
            'mothers_name' => 'string' ,
            'mothers_maiden_name' => 'string' ,
            'date_of_birth' => 'date_format:Y-m-d' ,
            'date_of_joining' => 'date_format:Y-m-d' ,
            'salary' => 'integer' ,
            'ssn' => 'string' ,
            'phone' => 'string' ,
            'city' => 'string|max:50',
            'state' => 'string|max:2',
            'zip' => 'integer',

            'roles'      => 'string|in:admin,standar,manager',
        ];
    }
}
