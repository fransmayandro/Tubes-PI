<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobsavedController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/company', [CompanyController::class, 'getcompany']);

Route::get('/company/{id}', [CompanyController::class, 'getacompany']);

Route::get('/job', [JobController::class, 'getjob']);

Route::get('/job/{id}', [JobController::class, 'getajob']);

Route::get('/jobsaved', [JobsavedController::class, 'getjobsaved']);

Route::get('/jobsaved/{id}', [JobsavedController::class, 'getajobsaved']);
