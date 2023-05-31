<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
class JobController extends Controller
{
    //function untuk API
    public function getjob()
    {
        $job = Job::join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('job_id', 'job_title', 'job_description', 'company_name', 'company_description', 'company_location', 'company_website', 
                'salary_range', 'requirements')
        ->get();
        if ($job->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $job;
    }

    public function getajob(string $id)
    {
        $job = DB::table('job_lists')->where('job_id',$id)->join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('job_id', 'job_title', 'job_description', 'company_name', 'company_description', 'company_location', 'company_website', 
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

    //function untuk website
    public function searchjobs(Request $request)
    {
        $search = $request->query('search');
        $jobs = Job::join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->where('job_title', 'like', '%'.$request->cariPekerjaan.'%')
        ->where('company_location', 'like', '%'.$request->cariLokasi.'%')
        ->select('job_title', 'company_name', 'company_location', 'job_description', 'salary_range', 'requirements')
        ->get();
        return view('homepage', [
            "jobs"=>$jobs 
        ]);
    }

    public function viewjobs()
    {
        $jobs = Job::join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('job_title', 'company_name', 'company_location', 'job_description', 'salary_range', 'requirements')
        ->Paginate(4);
        return view('homepage', [
            "jobs"=>$jobs 
        ]);
    }

    public function searchsalary(Request $request)
    {
        $salary = Job::join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->where('job_title', 'like', '%'.$request->cariPekerjaan.'%')
        ->where('salary_range', '>=',  $request->cariGajiMin)
        ->where('salary_range', '<=',  $request->cariGajiMaks)
        ->select('job_title', 'company_name', 'company_location', 'job_description', 'salary_range', 'requirements')
        ->get();
        return view('salarypage', [
            "salary"=>$salary 
        ]);
    }

    public function viewsalary()
    {
        $salary = Job::join('companies', 'job_lists.company_id', '=', 'companies.company_id')
        ->select('job_title', 'company_name', 'company_location', 'job_description', 'salary_range', 'requirements')
        ->Paginate(4);;
        return view('salarypage', [
            "salary"=>$salary 
        ]);
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
