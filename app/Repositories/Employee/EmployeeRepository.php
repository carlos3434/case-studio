<?php
namespace App\Repositories\Employee;

use App\Repositories\AbstractRepository;
use App\Repositories\Employee\EmployeeInterface;

class EmployeeRepository extends AbstractRepository implements EmployeeInterface
{

    protected $modelClassName = 'Employee';
    protected $modelClassNamePath = "App\Models\Employee";
    protected $collectionNamePath = "App\Http\Resources\Employee\EmployeeCollection";
    protected $resourceNamePath = "App\Http\Resources\Employee\EmployeeResource";
    

}