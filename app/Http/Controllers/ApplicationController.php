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
        $application = Application::join('users', 'applications.user_id', "=", 'users.id')
        ->join('job_lists', 'applications.job_id', '=', 'job_lists.job_id')
        ->select('application_id', 'name', 'email', 'job_title', 'job_description', 'resume_file', 'date_applied', 'status')
        ->get();
        if ($application->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $application;
    }

    public function getaapplication(string $id)
    {
        $application = DB::table('applications')->where('application_id',$id)
        ->join('users', 'applications.user_id', "=", 'users.id')
        ->join('job_lists', 'applications.job_id', '=', 'job_lists.job_id')
        ->select('application_id', 'name', 'email', 'job_title', 'job_description', 'resume_file', 'date_applied', 'status')
        ->get();
        // dd ($application);
        if ($application->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $application;
    }

    public function searchapplication(string $name)
    {
        $application = DB::table('applications')->where('name', 'like', '%'.$name.'%')
        ->join('users', 'applications.user_id', "=", 'users.id')
        ->join('job_lists', 'applications.job_id', '=', 'job_lists.job_id')
        ->select('application_id', 'name', 'email', 'job_title', 'job_description', 'resume_file', 'date_applied', 'status')
        ->get();
        if ($application->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $application;
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function putapplication(Request $request, $id)
    // {
    //     $application = Appplication::where('application_id',$id);
    //     $application->update($request->all());
    //     return $application;
    // }

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
