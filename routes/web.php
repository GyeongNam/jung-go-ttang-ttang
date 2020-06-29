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
// Route::get('/main', function (){
//   return view('main');
// });
Route::get('/Login', function () {
    session()->put('page', request()->headers->get('referer'));
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
Route::get('/manclothing', function () {
    return view('manclothing');
});
Route::get('/bidding-info', function () {
    return view('bidding-info');
});
Route::get('/wish_list', function(){
    return view('wish_list');
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
Route::get('/sign_rull', function () {
    return view('login.sign_rull');
});
Route::get('/cahtroom', function(){
  return view('cahtroom');
});
// user Controller
Route::post('/singup', 'UserController@store');
Route::post('/loging', 'UserController@loging');
Route::get('/mypage', 'UserController@mypage')->middleware('login');
Route::get('/Logout', 'UserController@logout')->middleware('login');
Route::post('/mypage_update', 'UserController@mypage_update')->middleware('login');
Route::post('/idcheck', 'UserController@idcheck');
Route::get('/mypage/update', 'UserController@user_binding')->middleware('login');
Route::get('/repassword/{id}', 'UserController@user_repwd');
Route::post('/user_pwd_update/{id}','UserController@user_pwd_update');
Route::get('/Servicecenter','UserController@qna');
Route::get('/','ItemController@mainview');


Route::get('/sasa','ItemController@sasa');

// item Controller
Route::post('/product', 'ItemController@store');
Route::get('/product-detail/{item_number}', 'ItemController@itemview');
Route::post('/product-detail/{item_number}', 'ItemController@police');
Route::post('/product-comment/{item_number}', 'ItemController@comment')->middleware('login');
Route::post('/product-largecomment/{item_number}/{commentnum}/{largecomment}', 'ItemController@largcomment')->middleware('login');
Route::post('/product-recomment/{item_number}/{commentnum}','ItemController@recomment')->middleware('login');
Route::post('/product-lecomment/{item_number}/{commentnum}','ItemController@lecomment')->middleware('login');
Route::get('/recomment/{comment_num}/{comm_item}', 'ItemController@commentremove')->middleware('login');
Route::get('/largcomment/{largecomment_num}/{largecomm_item}', 'ItemController@lecommentremove')->middleware('login');
Route::get('/wishitem_remove/{favorite_itemnum}/{favorite_name}', 'ItemController@wishitem_remove')->middleware('login');
Route::get('/remove/{item_number}/{id}', 'ItemController@removes')->middleware('login');
//Route::get('/', 'ItemController@mainview');
Route::get('/itemcheck', 'ItemController@myview')->middleware('login');
Route::get('/manclothing', 'ItemController@category');
Route::post('/product-Modifystore', 'ItemController@product_update')->middleware('login');
Route::get('/product-Modify', 'ItemController@sending_num');
Route::get('/wish_lst', 'ItemController@favorite_item')->middleware('login');
Route::get('/wish_list', 'ItemController@wish_itempg')->middleware('login');


// auction Controller
// Route::post(/auction_in, 'AuctionController@auction_in');
Route::get('/bidding-info/{item_number}', 'AuctionController@sendd')->middleware('login');
Route::post('/bidding-price', 'AuctionController@biddingprice')->middleware('login');
// mail & getimagesizefromstring
Route::post('/selectid', 'UserController@selectid');
Route::post('/selectpw', 'UserController@selectpw');
Route::post('/sms_send', 'SMSController@SendMessage');

// manager
Route::get('/manager_user', 'UserController@manager');
Route::get('/manager_user_info/{id}',  'UserController@managerINFO');
Route::get('/manager_item','ItemController@manageritem');
Route::post('/warning/{id}','UserController@warning');
