<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
class CompanyController extends Controller
{
    // function untuk API
    public function getcompany()
    {
        $company = Company::all();
        if ($company->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $company;
    }

    public function getacompany(string $id)
    {
        $company = DB::table('companies')->where('company_id',$id)->get();
        if ($company->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $company;
    }

    public function searchcompany(string $name)
    {
        $company = DB::table('companies')->where('company_name', 'like', '%'.$name.'%')->get();
        if ($company->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        return $company;
    }
    
    // function untuk website
    public function searchcompanies(Request $request)
    {
        $company = DB::table('companies')->where('company_name', 'like', '%'.$request->cariPerusahaan.'%')
        ->where('company_location', 'like', '%'.$request->cariLokasi.'%')
        ->select('company_name', 'company_description', 'company_location', 'company_website')
        ->get();
        return view('companypage', [
            "company"=>$company 
        ]);
    }

    public function viewcompanies()
    {
        $company = DB::table('companies')->select('company_name', 'company_description', 'company_location', 'company_website')
        ->Paginate(4);
        return view('companypage', [
            "company"=>$company 
        ]);
    }

    // public function create(){

    // }
    
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'nama' => 'required|max:255',
    //         'deskripsi' => 'required|max:255',
    //         'lokasi' => 'required|max:255',
    //         'website' => 'required|max:255',
    //         'title' => 'required|max:255',
    //         'deskripsipekerjaan' => 'required|max:255',
    //         'range' => 'required|max:255',
    //         'persyaratan' => 'required|max:255',
    //     ]);

    //     $company = DB::table('companies')->insert([
    //         'company_name' => $validated['nama'],
    //         'company_description' => $validated['deskripsi'],
    //         'company_location' => $validated['lokasi'],
    //         'company_website' => $validated['website']
    //     ]);

    //     $company = Company::all();
    //     dd ($company);
        // $job = DB::table('job_lists')->get('companies', 'job_lists.company_id', '=', 'companies.company_id')->insert([
        //     'job_title' => $validated['title'],
        //     'job_description' => $validated['deskripsipekerjaan'],
        //     'salary_range' => $validated['range'],
        //     'requirements' => $validated['persyaratan']
        // ]);

        // return redirect();
    }


    /**
     * Display the specified resource.
     */