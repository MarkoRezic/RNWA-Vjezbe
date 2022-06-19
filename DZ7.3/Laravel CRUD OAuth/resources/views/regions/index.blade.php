<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Regions') }}
        </h2>
    </x-slot>
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Regions</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('regions.create') }}"> Create New Region</a>
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
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($regions as $region)
        <tr>
            <td>#{{ $region->region_id }}</td>
            <td>{{ $region->region_name }}</td>
            <td>
                <form action="{{ route('regions.destroy',$region->region_id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('regions.show',$region->region_id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('regions.edit',$region->region_id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection
</x-app-layout>