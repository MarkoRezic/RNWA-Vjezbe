@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/users/{{$user->rid}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="rid" id="rid" />
            <div class="row">
                <label for="fname">Ime</label>
                <input type="text" class="form-control" name="fname" id="fname" value="{{$user->fname}}">
            </div>
            <div class="row">
                <label for="lname">Prezime</label>
                <input type="text" class="form-control" name="lname" id="lname" value="{{$user->lname}}">
            </div>
            <div class="row">
                    <label for="gender">Spol</label>
                    <select id="gender" name="gender">
                        <option value="-1" selected disabled>Odaberite spol</option>
                        <option value="male" {{$user->gender == 'male' ? 'selected' : ''}}>Muško</option>
                        <option value="female" {{$user->gender == 'female' ? 'selected' : ''}}>Žensko</option>
                    </select>
            </div>
            <div class="row">
                <label for="dob">Datum rođenja</label>
                <input type="date" class="form-control" name="dob" id="dob" value="{{$user->dob}}">
            </div>
            <br><br>
            <div class="row">
                <br><br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

@endsection
