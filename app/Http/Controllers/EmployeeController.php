<?php

namespace App\Http\Controllers;

use App\Models\Employee;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:manager|admin|standar'])->only(['index']);
        $this->middleware(['role:manager|admin'])->only(['create','store','show','edit','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query =Employee::query();
        if(request('search')){
            $query->where('first_name','LIKE','%'.request('search').'%');
        }
        
        if (request()->has(['field', 'direction'])) {
            $query->orderBy(request('field'), request('direction'));
        } else {
            $query->orderBy('first_name', 'asc');
        }
        $employees = $query->paginate(10);

        return Inertia::render('Employee/Index', [
            'employees' => $query->paginate()->withQueryString(),
            'filters' => request()->all(['search', 'field', 'direction'])
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Employee/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->all());
        return Redirect::route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return Inertia::render('Employee/Show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return Inertia::render('Employee/Edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        return Redirect::route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return Redirect::route('employees.index');
    }
}
