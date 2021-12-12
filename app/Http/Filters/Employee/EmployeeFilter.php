<?php
namespace App\Http\Filters\Employee;


use App\Http\Filters\AbstractFilter;

class EmployeeFilter extends AbstractFilter
{
    protected $filters = [
        'first_name' => User\FirstNameFilter::class
    ];
}