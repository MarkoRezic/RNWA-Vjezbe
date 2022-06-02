<!DOCTYPE html>
<html>
<head>
    <title>HR Schema</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
  
<div class="container">
    HR Schema
    <a class="btn btn-info" href="{{ route('regions.index') }}"> Regions</a>
    <a class="btn btn-info" href="{{ route('countries.index') }}"> Countries</a>
    <a class="btn btn-info" href="{{ route('locations.index') }}"> Locations</a>
    <a class="btn btn-info" href="{{ route('departments.index') }}"> Departments</a>
    <a class="btn btn-info" href="{{ route('employees.index') }}"> Employees</a>
    <a class="btn btn-info" href="{{ route('jobs.index') }}"> Jobs</a>

    
    @yield('content')
</div>
   
</body>
</html>