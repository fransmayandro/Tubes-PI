<?php

use Illuminate\Support\Facades\Route;

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
    return view('landing');
});

Route::get('/company', function () {
    return view('company');
});

Route::get('/job', function () {
    return view('job');
});

Route::get('/test', function () {
    return view('halo');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/master', function () {
    return view('master');
});

Route::get('/welcome', function () {
    return view('welcome');
});