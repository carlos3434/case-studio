<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employee_id'=> $this->employee_id,
            'name_prefix'=> $this->name_prefix,
            'first_name'=> $this->first_name,
            'middle_initial'=> $this->middle_initial,
            'last_name'=> $this->last_name,
            'gender'=> $this->gender,
            'email'=> $this->email,
            'fathers_name'=> $this->fathers_name,
            'mothers_name'=> $this->mothers_name,
            'mothers_maiden_name'=> $this->mothers_maiden_name,
            'date_of_birth'=> $this->date_of_birth,
            'date_of_joining'=> $this->date_of_joining,
            'salary'=> $this->salary,
            'ssn'=> $this->ssn,
            'phone'=> $this->phone,
            'city'=> $this->city,
            'state'=> $this->state,
            'zip'=> $this->zip,
        ];
    }
}