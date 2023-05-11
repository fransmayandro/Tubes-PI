<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Application;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getapplication()
    {
        return Application::join('tbl_users', 'applications.user_id', "=", 'tbl_users.user_id')
        ->join('job_lists', 'applications.job_id', '=', 'job_lists.job_id')
        ->select('application_id', 'username', 'email', 'job_title', 'job_description', 'resume_file', 'date_applied', 'status')
        ->get();
    }

    public function getaapplication(string $id)
    {
        return DB::table('applications')->where('application_id',$id)
        ->join('tbl_users', 'applications.user_id', "=", 'tbl_users.user_id')
        ->join('job_lists', 'applications.job_id', '=', 'job_lists.job_id')
        ->select('application_id', 'username', 'email', 'job_title', 'job_description', 'resume_file', 'date_applied', 'status')
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
