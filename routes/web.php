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
// 페이지 이동
Route::get('/', function () {
    return view('layout.layout_main');
});

Route::get('/Login', function () {
    return view('login.login');
});

Route::get('/sign_up', function () {
    return view('login.sign_up');
});

Route::get('/mypage', function () {
    return view('user.mypage');
});

Route::get('/mypage/update', function () {
    return view('user.mypage_update');
});

Route::get('/kategorie', function () {
    return view('kategorie');
});

Route::get('/find_act', function () {
    return view('login.find_act');
});

// DB연동
Route::post('/singup', 'UserController@store');
Route::post('/loging', 'UserController@loging');
