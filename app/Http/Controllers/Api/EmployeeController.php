<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\Employee\EmployeeInterface;

class EmployeeController extends Controller
{
    private $employeeRepository;

    public function __construct(EmployeeInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->middleware(['role:manager|admin|standar'])->only(['index']);
        $this->middleware(['role:manager|admin'])->only(['store','show', 'update','destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->employeeRepository->all($request);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = $this->employeeRepository->create( $request->all() );
        return response()->json($employee, 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return $this->employeeRepository->getOne($employee);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee )
    {
        $employee->update($request->all());
        return response()->json($employee, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $this->employeeRepository->deleteOne($employee);
        return response()->json(null, 204);
    }
}