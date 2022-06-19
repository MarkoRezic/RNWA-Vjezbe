<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Department</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('departments.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('departments.update', $department->department_id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID:</strong>
                    <input type="text" name="department_id" value="{{ $department->department_id }}" class="form-control" placeholder="department_id">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="department_name" value="{{ $department->department_name }}" class="form-control" placeholder="department_name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Manager ID:</strong>
                    <select id="manager_id" name="manager_id">
                        <option value="-1" selected disabled>Select manager</option>
                        @foreach($managers as $manager)
                            <option value="{{$manager->employee_id}}" {{ $manager->employee_id == $department->manager_id ? 'selected' : ''}}>{{ $manager->first_name }} {{ $manager->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location ID:</strong>
                    <select id="location_id" name="location_id">
                        <option value="-1" selected disabled>Select location</option>
                        @foreach($locations as $location)
                            <option value="{{$location->location_id}}" {{ $location->location_id == $department->location_id ? 'selected' : ''}}>{{ $location->city }}, {{ $location->country_id }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection
</x-app-layout>