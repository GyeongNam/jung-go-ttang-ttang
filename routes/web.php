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
<<<<<<< HEAD

Route::get('/kategorie', function () {
    return view('kategorie');
});
=======
// DB연동
Route::post('/login', 'UserController@store');
>>>>>>> eaf3014e321e2ad2734fe68822d88129edf803c9
