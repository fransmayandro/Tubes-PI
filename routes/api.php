<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobsavedController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthAPIController;


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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/company', [CompanyController::class, 'getcompany']);
    
    Route::get('/company/{id}', [CompanyController::class, 'getacompany']);
    
    Route::get('/company/{name}/search', [CompanyController::class, 'searchcompany']);
    
    Route::get('/job', [JobController::class, 'getjob']);
    
    Route::get('/job/{id}', [JobController::class, 'getajob']);
    
    Route::get('/job/{name}/search', [JobController::class, 'searchjob']);
    
    Route::get('/jobsaved', [JobsavedController::class, 'getjobsaved']);
    
    Route::get('/jobsaved/{id}', [JobsavedController::class, 'getajobsaved']);
    
    Route::get('/jobsaved/{name}/search', [JobsavedController::class, 'searchjobsaved']);
    
    Route::get('/application', [ApplicationController::class, 'getapplication']);
    
    Route::get('/application/{id}', [ApplicationController::class, 'getaapplication']);
    
    Route::get('/application/{name}/search', [ApplicationController::class, 'searchapplication']);
    
    Route::post('/logoutapi', [AuthAPIController::class, 'logout']);
});

Route::post('/registerapi', [AuthAPIController::class, 'register']);

Route::post('/loginapi', [AuthAPIController::class, 'login']);


