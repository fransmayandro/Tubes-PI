<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getjob()
    {
        return Job::join('job_type', 'job_lists.job_type_id', '=', 'job_type.job_type_id')
        ->join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('job_id', 'job_type', 'job_title', 'job_description', 'company_name', 'company_description', 'company_location', 'company_website', 
                'salary_range', 'requirements')
        ->get();
    }

    public function getajob(string $id)
    {
        return DB::table('job_lists')->where('job_id',$id)
        ->join('job_type', 'job_lists.job_type_id', '=', 'job_type.job_type_id')
        ->join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('job_id', 'job_type', 'job_title', 'job_description', 'company_name', 'company_description', 'company_location', 'company_website', 
                'salary_range', 'requirements')
        ->get();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
