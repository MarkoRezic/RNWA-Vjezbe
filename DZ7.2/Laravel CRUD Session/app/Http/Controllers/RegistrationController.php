<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = Registration::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
        ]);
        $user  = new Registration();
        $user->fname = $request['fname'];
        $user->lname = $request['lname'];
        $user->gender = $request['gender'];
        $user->dob = $request['dob'];
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $registration = Registration::all()->find($id);
        return view('users.edit')->with('user', $registration);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
        ]);
        $registration = Registration::all()->find($id);
        $registration->fname = $request['fname'];
        $registration->lname = $request['lname'];
        $registration->gender = $request['gender'];
        $registration->dob = $request['dob'];
        $registration->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Registration::all()->find($id)->delete();
        return redirect()->route('users.index');
    }
}
