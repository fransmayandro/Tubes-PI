<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jobsaved;
class JobsavedController extends Controller
{
    //function untuk API
    public function getjobsaved()
    {
        $jobsaved = Jobsaved::join('users', 'saved_jobs.user_id', '=', 'users.id')
        ->join('job_lists', 'saved_jobs.job_id', '=', 'job_lists.job_id')
        ->join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('saved_id', 'name', 'email', 'job_title', 'company_name', 'company_location', 'company_website')
        ->get();
        if ($jobsaved->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $jobsaved;
    }

    public function getajobsaved(string $id)
    {
        $jobsaved = DB::table('saved_jobs')->where('saved_id',$id)
        ->join('users', 'saved_jobs.user_id', '=', 'users.id')
        ->join('job_lists', 'saved_jobs.job_id', '=', 'job_lists.job_id')
        ->join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('saved_id', 'name', 'email', 'job_title', 'company_name', 'company_location', 'company_website')
        ->get();
        if ($jobsaved->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $jobsaved;
    }

    public function searchjobsaved(string $name)
    {
        $jobsaved = DB::table('saved_jobs')->where('job_title', 'like', '%'.$name.'%')
        ->join('users', 'saved_jobs.user_id', '=', 'users.id')
        ->join('job_lists', 'saved_jobs.job_id', '=', 'job_lists.job_id')
        ->join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('saved_id', 'name', 'email', 'job_title', 'company_name', 'company_location', 'company_website')
        ->get();
        if ($jobsaved->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $jobsaved;
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
