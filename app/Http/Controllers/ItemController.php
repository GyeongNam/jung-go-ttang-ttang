<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use Image;

class ItemController extends Controller
{
  public function store(Request $request){
    $item_pic = $request->file('item_pic');
    $item_data = $item_pic->getClientOriginalName();
    Image::make($item_pic)->save(public_path('/img/item/'.$item_data));

    $item = new Item([
      'item_name' => $request->get('product_name'),
      'item_maker' => $request->get('product_maker'),
      'item_buy' => $request->get('product_buy'),
      'item_category' => $request->get('product_category'),
      'item_open' => $request->get('select_state'),
      'item_deadline' => $request->get('Auction_last_time'),
      'item_startday' => date('Y-m-d'),
      'item_picture' => $item_data,
      'item_pictureup' => $item_data,
      'item_picturedown' => $item_data,
      'item_pictureleft' => $item_data,
      'item_picturerigth' => $item_data,
      'item_picturebehind' => $item_data,
      'item_picturefront' => $item_data,
      'item_startprice' => $request->get('Auction_start'),
      'item_success' => true,
      'success' => false,
      'seller_id' => decrypt(session()->get('login_ID'))
    ]);
    $item->save();
    return redirect('/itemcheck');
    //return view(''); 내가 올린 경매 페이지로 이동
  }
  public function mainview(Request $request){
    //$top = 시간당 조회수가 높은 페이지에 item_nurnber를 가져온다
    $topview = Item::select('item_name', 'item_buy', 'item_picture')->where(['item_number'=>$top])->get();
    return view('main', [
      'item_name' => $topview[0]->item_name,
      'item_buy' => $topview[0]->item_buy,
      'item_picture' => $topview[0]->item_picture
    ]);
  }
  public function myview(Request $request){
    $id = session()->get('login_ID');
    //$m_Participation = 내가 참여한 경매의 물건번호
    //$myParticipation = Item::select('item_name', 'item_picture', 'item_startprice', 'item_success', 'success')->where(['item_nurnber'=> $m_Participation])->get();
    $myStat = Item::select('item_name', 'item_picture', 'item_startprice', 'item_success', 'success')->where(['seller_id'=> decrypt($id)])->get();
    return view('itemcheck', [
      'myStat' => $myStat
    ]);
  }
  public function itemview(Request $request){
    $id= session()->get('login_ID');
    $myproduct= Item::select(
      'item_name',
      'item_picture',
      'item_startprice',
      'item_success',
      'success',
      'item_startprice',
      'item_open','item_buy','item_category','item_maker','seller_id',
    'item_picturefront','item_pictureback',
    'item_picturebehind', 'item_pictureup','item_pictureleft',
    'item_picturerigth','visit_count')->where(['seller_id'=> decrypt($id)])->get();
    return view('product-detail', [
      'myproduct' => $myproduct
    ]);
  }
}
