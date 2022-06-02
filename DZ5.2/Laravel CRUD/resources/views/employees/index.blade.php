@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employees</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Create New Employee</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Hire Date</th>
            <th>Job ID</th>
            <th>Salary</th>
            <th>Commission Pct</th>
            <th>Manager ID</th>
            <th>Department ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>#{{ $employee->employee_id }}</td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone_number }}</td>
            <td>{{ $employee->hire_date }}</td>
            <td>{{ $employee->job_id }}</td>
            <td>{{ $employee->salary }}</td>
            <td>{{ $employee->commission_pct }}</td>
            <td>{{ $employee->manager_id }}</td>
            <td>{{ $employee->department_id }}</td>
            <td>
                <form action="{{ route('employees.destroy', $employee->employee_id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('employees.show', $employee->employee_id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('employees.edit', $employee->employee_id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection