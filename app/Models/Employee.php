<?php
  
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
  
class Employee extends Model
{  
    protected $fillable = [
        'employee_id',
        'name_refix',
        'first_name',
        'middle_initial',
        'last_name',
        'gender',
        'email',
        'fathers_name',
        'mothers_name',
        'mothers_maiden_name',
        'date_of_birth',
        'date_of_joining',
        'salary',
        'ssn',
        'phone',
        'city',
        'state',
        'zip'
    ];
    
}