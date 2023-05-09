<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin');
});

Route::get('/1', function () {
    return view('index-1');
});

Route::get('/email', function () {
    return view('email');
});

Route::get('/typo', function () {
    return view('typograpy');
});

Route::get('/alert', function () {
    return view('alert');
});

Route::get('/buttons', function () {
    return view('buttons');
});




