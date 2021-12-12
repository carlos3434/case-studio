<?php
  
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Filters\Employee\EmployeeFilter;

use Illuminate\Database\Eloquent\Builder;
class Employee extends Model
{  
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'name_prefix',
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
    
    public function scopeFilter(Builder $builder, $request)
    {
        return (new EmployeeFilter($request))->filter($builder);
    }
}