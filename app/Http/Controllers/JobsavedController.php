<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jobsaved;
class JobsavedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getjobsaved()
    {
        return Jobsaved::join('users', 'saved_jobs.user_id', '=', 'users.id')
        ->join('job_lists', 'saved_jobs.job_id', '=', 'job_lists.job_id')
        ->join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('saved_id', 'name', 'email', 'job_title', 'company_name', 'company_location', 'company_website')
        ->get();
    }

    public function getajobsaved(string $id)
    {
        return DB::table('saved_jobs')->where('saved_id',$id)
        ->join('users', 'saved_jobs.user_id', '=', 'users.id')
        ->join('job_lists', 'saved_jobs.job_id', '=', 'job_lists.job_id')
        ->join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('saved_id', 'name', 'email', 'job_title', 'company_name', 'company_location', 'company_website')
        ->get();
    }

    public function searchjobsaved(string $name)
    {
        return DB::table('saved_jobs')->where('job_title', 'like', '%'.$name.'%')
        ->join('users', 'saved_jobs.user_id', '=', 'users.id')
        ->join('job_lists', 'saved_jobs.job_id', '=', 'job_lists.job_id')
        ->join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('saved_id', 'name', 'email', 'job_title', 'company_name', 'company_location', 'company_website')
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
