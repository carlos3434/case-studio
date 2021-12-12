<?php
namespace App\Http\Filters\Employee;

class FirstNameFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('first_name', $value);
    }
}