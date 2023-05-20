<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisUserController;

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

Route::get('/register',[RegisUserController::class,'index'])->name('register');
Route::post('/proses',[RegisUserController::class,'actionregister'])->name('proses');
// $route['register'] = 'Register/index';
// $route['register/process'] = 'Register/process';