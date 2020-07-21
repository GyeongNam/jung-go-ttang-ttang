<?php

use Illuminate\Support\Facades\Route;
use App\Events\WebsocketEvent;

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
Route::get('/manager_policy', function(){
    return view('manager_policy');
});
Route::get('/manager_login', function(){
    return view('manager_login');
});
Route::get('/sign_rull', function () {
    return view('login.sign_rull');
});
Route::get('/qna', function () {
    return view('qna');
});
Route::get('/manager_qna', function(){
    return view('manager_qna');
});
// Route::get('/cahtroom', function(){
//
//   return view('cahtroom');
// });
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
Route::get('/Servicecenter','UserController@qna')->name('Servicecenter1');
Route::get('/qna11','UserController@qna1');
Route::post('/qna_contents/{qna_number}','UserController@qnacont');
Route::post('/qnadelete/{qna_number}','UserController@qna_delete');





// item Controller
Route::get('/mylocation','ItemController@infoview');
Route::get('/','ItemController@mainview');
Route::post('/product', 'ItemController@store')->middleware('police');
Route::get('/product-detail/{item_number}', 'ItemController@itemview');
Route::post('/police/{item_number}', 'ItemController@police')->middleware('login');
Route::post('/product-comment/{item_number}', 'ItemController@comment')->middleware('login');
Route::post('/product-largecomment/{largecomment}/{commentnum}', 'ItemController@largcomment')->middleware('login');

Route::post('/product-recomment/{item_number}/{commentnum}','ItemController@recomment')->middleware('login');
Route::post('/product-lecomment/{item_number}/{commentnum}/{largecomment_num}','ItemController@lecomment')->middleware('login');
Route::get('/recomment/{comment_num}/{comm_item}', 'ItemController@commentremove')->middleware('login');
Route::get('/largcomment/{largecomm_item}/{largecomment_num}', 'ItemController@lecommentremove')->middleware('login');
Route::get('/wishitem_remove/{favorite_itemnum}/{favorite_name}', 'ItemController@wishitem_remove')->middleware('login');
Route::get('/remove/{item_number}/{id}', 'ItemController@removes')->middleware('login');
//Route::get('/', 'ItemController@mainview');
Route::get('/itemcheck', 'ItemController@myview')->middleware('login');
Route::get('/manclothing', 'ItemController@category');
Route::post('/product-Modifystore', 'ItemController@product_update')->middleware('login','police');
Route::get('/product-Modify', 'ItemController@sending_num');
Route::get('/commentlike/{comment_num}', 'ItemController@commentlike')->middleware('login');
Route::get('/wish_lst', 'ItemController@favorite_item')->middleware('login');
Route::get('/wish_list', 'ItemController@wish_itempg')->middleware('login');
Route::get('/end/{item_number}', 'ItemController@end_action')->middleware('login');


// auction Controller
// Route::post(/auction_in, 'AuctionController@auction_in');
Route::get('/bidding-info/{item_number}', 'AuctionController@sendd')->middleware('login','police');
Route::post('/bidding-price', 'AuctionController@biddingprice')->middleware('login','police');
Route::get('/remove_enditem/{item_number}/{id}', 'AuctionController@remove_enditem')->middleware('login');

// mail & getimagesizefromstring
Route::post('/selectid', 'UserController@selectid');
Route::post('/selectpw', 'UserController@selectpw');
Route::post('/sms_send', 'SMSController@SendMessage');

// manager
Route::get('/manager_user', 'UserController@manager')->middleware('manager');
Route::get('/manager_user_info/{id}',  'UserController@managerINFO')->middleware('manager');
Route::get('/manager_item','ItemController@manageritem')->middleware('manager');
Route::get('/manager_policy', 'UserController@policy')->middleware('manager');
Route::post('/warning/{id}','UserController@warning')->middleware('manager');
Route::post('/ban/{id}','UserController@ban')->middleware('manager');
Route::post('/managerlogin','UserController@managerlogin');
Route::get('/manager_main','UserController@graph')->middleware('manager');
Route::get('/manager_logout','UserController@managerlogout')->middleware('manager');
Route::get('/manager_delete','ItemController@managerdelete')->middleware('manager');
Route::get('/manager_item_info/{item_number}',  'ItemController@iteminfo')->middleware('manager');
Route::get('/manager_qna','UserController@managerqna')->middleware('manager');
Route::get('/manager_qna_info/{qna_number}','UserController@managerqnainfo')->middleware('manager');
Route::post('/qna_answer/{qna_number}','UserController@qna_answer')->middleware('manager');

//fann_test
Route::get('/sasa','ItemController@sasa');

// MessageController
Route::get('/cahtroom', 'MessageController@muser')->middleware('login');
Route::post('/messegesend', 'MessageController@messegesend')->middleware('login');


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
