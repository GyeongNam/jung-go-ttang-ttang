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
    return view('layout.layout_main');
});

Route::get('/Login', function () {
    return view('user.Login');
});

Route::get('/sign_up', function () {
    return view('user.sign_up');
});

Route::get('/mypage', function () {
    return view('user.mypage');
});

Route::get('/mypage/update', function () {
    return view('user.mypage_update');
});
