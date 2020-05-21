<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
  public function store(Request $request){
    $item = new Item([
      'item_name' => $request->get(''),
      'item_maker' => $request->get(''),
      'item_buy' => $request->get(''),
      'item_category' => $request->get(''),
      'item_open' => $request->get(''),
      'item_deadline' => $request->get(''),
      'item_startday' => $request->get(''),
      'item_startprice' => $request->get(''),
      'item_success' => $request->get(''),
      'success' => $request->get(''),
      'seller_id' => $request->get(''),
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
    //$m_Participation = 내가 참여한 경매의 물건번호
    //$m_srat =
    $myParticipation = Item::select('item_picture', 'item_startprice', 'item_success', 'success')->where(['item_nurnber'=>])->get();
    $mystat = Item::select('')->where([])
    // return view('내가 올린 경매, 내가 참여한 경매', [
    //   'item_name' => $myview[0]->item_name,
    //   'item_buy' => $myview[0]->item_buy,
    //   'item_pictuer' => $myview[0]->item_pictuer
    // ]);
  }
}
