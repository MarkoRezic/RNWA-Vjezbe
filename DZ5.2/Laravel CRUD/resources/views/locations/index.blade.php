@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Locations</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('locations.create') }}"> Create New Location</a>
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
            <th>Street address</th>
            <th>Postal code</th>
            <th>City</th>
            <th>State Province</th>
            <th>Country ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($locations as $location)
        <tr>
            <td>#{{ $location->location_id }}</td>
            <td>{{ $location->street_address }}</td>
            <td>{{ $location->postal_code }}</td>
            <td>{{ $location->city }}</td>
            <td>{{ $location->state_province }}</td>
            <td>{{ $location->country_id }}</td>
            <td>
                <form action="{{ route('locations.destroy', $location->location_id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('locations.show', $location->location_id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('locations.edit', $location->location_id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection