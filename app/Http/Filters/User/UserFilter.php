<?php
namespace App\Http\Filters\User;


use App\Http\Filters\AbstractFilter;

class UserFilter extends AbstractFilter
{
    protected $filters = [
        'first_name' => FirstNameFilter::class,
        'name' => NameFilter::class
    ];
}