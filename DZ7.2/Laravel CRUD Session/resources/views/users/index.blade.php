@extends('layouts.app')

@section('content')
    <div class="row">
        <a class="btn btn-block btn-primary" href="/users/create">New</a>
    </div>
    <table class="table">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ime</th>
            <th scope="col">Prezime</th>
            <th scope="col">Spol</th>
            <th scope="col">Datum rođenja</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        @foreach($users as $row)
            <tr>
                <th scope="row">{{$row->rid}} </th>
                <td> {{$row->fname}}</td>
                <td> {{$row->lname}}</td>
                <td> {{$row->gender}}</td>
                <td> {{$row->dob}}</td>
                <td><a href="/users/{{$row->rid}}/edit" class="btn btn-primary btn-xs"> Edit</a>
                </td>
                <td>
                    <form action="/users/{{$row->rid}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
