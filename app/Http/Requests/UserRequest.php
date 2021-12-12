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
            'roles'      => 'string|in:admin,standar,manager',
        ];
    }
}
