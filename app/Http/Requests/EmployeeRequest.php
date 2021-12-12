<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
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
            'employee_id' => 'required|integer' ,
            'name_prefix' => 'required|string|max:5' ,
            'first_name' => 'required|string' ,
            'middle_initial' => 'required|string' ,
            'last_name' => 'required|string' ,
            'gender' => 'required|string|in:F,M',
            'email' => 'required|string' ,
            'fathers_name' => 'required|string' ,
            'mothers_name' => 'required|string' ,
            'mothers_maiden_name' => 'required|string' ,
            'date_of_birth' => 'required|date_format:Y-m-d' ,
            'date_of_joining' => 'required|date_format:Y-m-d' ,
            'salary' => 'required|integer' ,
            'ssn' => 'required|string' ,
            'phone' => 'required|string' ,
            'city' => 'required|string|max:50',
            'state' => 'required|string|max:2',
            'zip' => 'required|integer',
        ];
    }

}   