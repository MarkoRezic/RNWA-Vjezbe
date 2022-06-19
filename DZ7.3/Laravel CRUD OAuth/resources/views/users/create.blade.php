@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/users" method="post">
            @csrf
            <div class="row">
                <label for="fname">Ime</label>
                <input type="text" class="form-control" name="fname" id="fname">
            </div>
            <div class="row">
                <label for="lname">Prezime</label>
                <input type="text" class="form-control" name="lname" id="lname">
            </div>
            <div class="row">
                <label for="gender">Spol</label>
                <select id="gender" name="gender">
                    <option value="-1" selected disabled>Odaberite spol</option>
                    <option value="male">Muško</option>
                    <option value="female">Žensko></option>
                </select>
            </div>
            <div class="row">
                <label for="dob">Datum rođenja</label>
                <input type="date" class="form-control" name="dob" id="dob">
            </div>
            <br><br>
            <div class="row">
                <br><br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

@endsection
