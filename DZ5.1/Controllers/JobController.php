<?php


class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        $data['jobs'] = $jobs;
        self::CreateView('JobIndexView', $data);
    }

    public function create()
    {
        self::CreateView('JobAddView');
    }


    public function store($request)
    {
        Job::save($request['job_id'], $request['job_title'], $request['min_salary'], $request['max_salary']);
        $this->index();
    }

    public function edit($request)
    {
        $job = Job::find($request['job_id']);
        $data['job'] = $job;
        self::CreateView('JobEditView', $data);
    }


    public function update($request)
    {
        Job::update($request['job_id'], $request['job_title'], $request['min_salary'], $request['max_salary']);
        $this->index();
    }

    public function delete($request)
    {
        Job::delete($request['job_id']);
        $this->index();
    }
}