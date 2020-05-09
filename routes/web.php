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
    return view('layout');
});

Route::get('/2', function () {
    return view('layout2');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/sign_up', function () {
    return view('sign_up');
});

// 모듈화 Ver
Route::get('/register2', function () {
    return view('user.register');
});
