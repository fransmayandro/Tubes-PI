<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisUserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');  
});
Route::get('/home',[JobController::class,'viewjobs'])->name('home');
Route::get('/companypage',[CompanyController::class,'viewcompanies'])->name('companypage');
Route::post('/searchjobs',[JobController::class,'searchjobs'])->name('search');
Route::post('/searchcompanies',[CompanyController::class,'searchcompanies'])->name('search');

Route::middleware(['guest'])->group(function(){
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/register',[AuthController::class,'registerPost'])->name('register');
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'loginPost'])->name('login');
});

Route::middleware('auth')->group(function(){
    Route::post('/proses',[RegisUserController::class,'actionregister'])->name('proses');
    Route::post('/storecompany',[CompanyController::class,'store'])->name('company.store');
    Route::get('/createcompany',[CompanyController::class,'create'])->name('company.create');
});