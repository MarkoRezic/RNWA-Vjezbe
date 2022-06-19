<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs') }}
        </h2>
    </x-slot>
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Jobs</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('jobs.create') }}"> Create New Job</a>
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
            <th>Title</th>
            <th>Min Salary</th>
            <th>Max Salary</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($jobs as $job)
        <tr>
            <td>#{{ $job->job_id }}</td>
            <td>{{ $job->job_title }}</td>
            <td>{{ $job->min_salary }}</td>
            <td>{{ $job->max_salary }}</td>
            <td>
                <form action="{{ route('jobs.destroy', $job->job_id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('jobs.show', $job->job_id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('jobs.edit', $job->job_id) }}">Edit</a>
   
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