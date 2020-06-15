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
    return view('main');
});

Route::get('/Login', function () {
    return view('login.login');
});

Route::get('/sign_up', function () {
    return view('login.sign_up');
});

Route::get('/mypage', function () {
    return view('user.mypage');
})->middleware('login');

Route::get('/kategorie', function () {
    return view('kategorie');
});

Route::get('/find_act', function () {
    return view('login.find_act');
});
Route::get('/itemcheck', function () {
    return view('itemcheck');
});
Route::get('/item/product', function () {
    return view('product');
});
 Route::get('/product-Modify', function(){
    return view('product-Modify');
 });
// Route::get('/product-detail', function(){
//    return view('product-detail');
// });
Route::get('/manclothing', function () {
    return view('manclothing');
});
Route::get('/bidding-info', function () {
    return view('bidding-info');
});
Route::get('/wish_list', function(){
    return view('wish_list');
});
Route::get('/service', function(){
    return view('Servicecenter');
});
Route::get('/manager_main', function(){
    return view('manager_main');
});
Route::get('/manager_item', function(){
    return view('manager_item');
});
Route::get('/manager_user', function(){
    return view('manager_user');
});
Route::get('/manager_tok', function(){
    return view('manager_tok');
});

// user Controller
Route::post('/singup', 'UserController@store');
Route::post('/loging', 'UserController@loging');
Route::get('/mypage', 'UserController@mypage')->middleware('login');
Route::get('/Logout', 'UserController@logout')->middleware('login');
Route::post('/mypage_update', 'UserController@mypage_update')->middleware('login');
Route::post('/idcheck', 'UserController@idcheck');
Route::get('/mypage/update', 'UserController@user_binding')->middleware('login');
Route::post('/repassword/{id}', 'UserController@user_repwd');
Route::post('/user_pwd_update/{id}','UserController@user_pwd_update');

// item Controller
Route::post('/product', 'ItemController@store');
Route::get('/product-detail/{item_number}', 'ItemController@itemview');

//Route::get('/', 'ItemController@mainview');
Route::get('/itemcheck', 'ItemController@myview')->middleware('login');
Route::get('/manclothing', 'ItemController@category');
Route::post('/product-Modifystore', 'ItemController@product_update')->middleware('login');
Route::get('/product-Modify', 'ItemController@sending_num');
Route::get('/wish_lst', 'ItemController@favorite_item')->middleware('login');

// auction Controller
// Route::post(/auction_in, 'AuctionController@auction_in');
Route::get('/bidding-info/{item_number}', 'AuctionController@sendd')->middleware('login');
Route::post('/bidding-price', 'AuctionController@biddingprice')->middleware('login');
// mail
Route::get('/mail', 'UserController@mailsend');
Route::post('/selectid', 'UserController@selectid');
Route::post('/selectpw', 'UserController@selectpw');
