<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Job;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
    
        return view('employees.index')->with('employees', $employees);

    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create')->with('jobs', Job::all())->with('managers', Employee::all())->with('departments', Department::all());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required',
        ]);
    
        Employee::create($request->all());
     
        return redirect()->route('employees.index')
                        ->with('success','Employee created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'))->with('jobs', Job::all())->with('managers', Employee::all())->with('departments', Department::all());
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
    
        $employee->update($request->all());
    
        return redirect()->route('employees.index')
                        ->with('success','Employee updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
    
        return redirect()->route('employees.index')
                        ->with('success','Employee deleted successfully');
    }
}
