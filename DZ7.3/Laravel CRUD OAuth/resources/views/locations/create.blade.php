<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Locations') }}
        </h2>
    </x-slot>
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Location</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('locations.index') }}"> Back</a>
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
   
<form action="{{ route('locations.store') }}" method="POST">
    @csrf
  
     <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID:</strong>
                    <input type="text" name="location_id" class="form-control" placeholder="location_id">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Street address:</strong>
                    <input type="text" name="street_address" class="form-control" placeholder="street_address">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Postal code:</strong>
                    <input type="text" name="postal_code" class="form-control" placeholder="postal_code">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>City:</strong>
                    <input type="text" name="city" class="form-control" placeholder="city">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>State province:</strong>
                    <input type="text" name="state_province" class="form-control" placeholder="state_province">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Country ID:</strong>
                    <select id="country_id" name="country_id">
                        <option value="-1" selected disabled>Select country</option>
                        @foreach($countries as $country)
                            <option value="{{$country->country_id}}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</x-app-layout>