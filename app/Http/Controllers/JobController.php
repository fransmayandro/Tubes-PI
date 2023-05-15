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
        $job = Job::join('job_type', 'job_lists.job_type_id', '=', 'job_type.job_type_id')
        ->join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('job_id', 'job_type', 'job_title', 'job_description', 'company_name', 'company_description', 'company_location', 'company_website', 
                'salary_range', 'requirements')
        ->get();
        if ($job->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $job;
    }

    public function getajob(string $id)
    {
        $job = DB::table('job_lists')->where('job_id',$id)
        ->join('job_type', 'job_lists.job_type_id', '=', 'job_type.job_type_id')
        ->join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('job_id', 'job_type', 'job_title', 'job_description', 'company_name', 'company_description', 'company_location', 'company_website', 
                'salary_range', 'requirements')
        ->get();
        if ($job->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $job;
    }

    public function searchjob(string $name)
    {
        $job = DB::table('job_lists')->where('job_title', 'like', '%'.$name.'%')
        ->get();
        if ($job->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $job;
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
