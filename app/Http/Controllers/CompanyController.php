<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
