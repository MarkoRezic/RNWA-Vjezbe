<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Country;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
    
        return view('locations.index')->with('locations', $locations);

    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create')->with('countries', Country::all());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'country_id' => 'required',
        ]);
    
        Location::create($request->all());
     
        return redirect()->route('locations.index')
                        ->with('success','Location created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'))->with('countries', Country::all());
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
    
        $location->update($request->all());
    
        return redirect()->route('locations.index')
                        ->with('success','Location updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
    
        return redirect()->route('locations.index')
                        ->with('success','Location deleted successfully');
    }
}
