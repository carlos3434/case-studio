<?php
namespace App\Http\Filters\User;

class FirstNameFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('first_name', 'like', '%'.$value.'%');
    }
}