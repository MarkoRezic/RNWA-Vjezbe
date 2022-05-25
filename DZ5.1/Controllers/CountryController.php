<?php


class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $data['countries'] = $countries;
        self::CreateView('CountryIndexView', $data);
    }

    public function create()
    {
        $regions = Region::all();
        $data['regions'] = $regions;
        self::CreateView('CountryAddView', $data);
    }


    public function store($request)
    {
        Country::save($request['country_id'], $request['country_name'], $request['region_id']);
        $this->index();
    }

    public function edit($request)
    {
        $country = Country::find($request['country_id']);
        $data['country'] = $country;
        $regions = Region::all();
        $data['regions'] = $regions;
        self::CreateView('CountryEditView', $data);
    }


    public function update($request)
    {
        Country::update($request['country_id'], $request['country_name'], $request['region_id']);
        $this->index();
    }

    public function delete($request)
    {
        Country::delete($request['country_id']);
        $this->index();
    }
}