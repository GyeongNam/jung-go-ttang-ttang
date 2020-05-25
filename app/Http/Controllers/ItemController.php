<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
  public function store(Request $request){
    //$id = ;
    $item = new Item([
      'item_name' => $request->get('product_name'),
      'item_maker' => $request->get('product_maker'),
      'item_buy' => $request->get('product_buy'),
      'item_category' => $request->get('product_category'),
      'item_open' => $request->get('open'),
      'item_deadline' => $request->get('Auction_last_time'),
      'item_startday' => date("Y-m-d h:i:s a", time()),
      'item_startprice' => $request->get('Auction_start'),
      // 'item_success' => $request->get(''), 진행상태
      // 'success' => $request->get(''),      낙찰여부
      'seller_id' => session()->get('login_ID')
    ]);
    $item->save();
    //return view(''); 내가 올린 경매 페이지로 이동
  }
  public function mainview(Request $request){
    //$top = 시간당 조회수가 높은 페이지에 item_nurnber를 가져온다
    $topview = Item::select('item_name', 'item_buy', 'item_pictuer')->where(['item_nurnber'=>$top])->get();
    return view('main', [
      'item_name' => $topview[0]->item_name,
      'item_buy' => $topview[0]->item_buy,
      'item_pictuer' => $topview[0]->item_pictuer
    ]);
  }
  public function myview(Request $request){
    $id = session()->get('login_ID');
    //$m_Participation = 내가 참여한 경매의 물건번호
    $myParticipation = Item::select('item_name', 'item_picture', 'item_startprice', 'item_success', 'success')->where(['item_nurnber'=> $m_Participation])->get();
    $myStat = Item::select('item_name', 'item_picture', 'item_startprice', 'item_success', 'success')->where(['seller_id'=> $id])->get();
    return view('내가 올린 경매, 내가 참여한 경매', [
      'mp_item_name' => $myParticipation[0]->item_name,
      'mp_item_picture' => $myParticipation[0]->item_picture,
      'mp_item_startprice' => $myParticipation[0]->item_startprice,
      'mp_item_success' => $myParticipation[0]->item_success,
      'mp_success' => $myParticipation[0]->success,
      'ms_item_name' => $myStat[0]->item_name,
      'ms_item_picture' => $myStat[0]->item_picture,
      'ms_item_startprice' => $myStat[0]->item_startprice,
      'ms_item_success' => $myStat[0]->item_success,
      'ms_success' => $myStat[0]->success
    ]);
  }
}
