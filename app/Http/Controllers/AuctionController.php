<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auction;
use App\Enditem;
use App\Item;


class AuctionController extends Controller
{
    public function sendd($item_number){
      $id = session()->get('login_ID');
      $sendds = Item::select('item_number', 'item_picture', 'item_name', 'item_startprice')->where(['item_number'=>$item_number])->get();
      $max = Auction::select('item_price')->where(['auction_itemnum'=>$item_number])->get();
      $maxs =  $max->max('item_price');
      return view('bidding-info', [
        'sendd' => $sendds,
        'max' => $maxs,
        'ids'=>decrypt($id)
      ]);
    }

    public function biddingprice(Request $request){
      $bdp = $request->input('num_s');
      $id = session()->get('login_ID');
      $data = Auction::select('*')->where(['auction_itemnum' => $bdp, 'buyer_ID'=>decrypt($id)])->get();
      if(count($data)>0)
      {
        $update=Auction::where(['auction_itemnum' => $bdp, 'buyer_ID'=>decrypt($id)])->update([
          'item_price' => $request->input('bdinput')
        ]);
        return redirect('/itemcheck');
      }
      else {
        $action = new Auction([
          'buyer_ID' => decrypt($id),
          'item_price' =>$request->input('bdinput'),
          'auction_itemnum' => $bdp
        ]);
        $action->save();
        return redirect('/itemcheck');
      }
    }

    public function remove_enditem($item_number, $id){
      $out1 = Enditem::select('*')->where(['end_num'=>$item_number, 'buyer'=>decrypt($id), 'success_user1'=>decrypt($id)])->get();
      $out2 = Enditem::select('*')->where(['end_num'=>$item_number, 'buyer'=>decrypt($id), 'success_user2'=>decrypt($id)])->get();
      $out3 = Enditem::select('*')->where(['end_num'=>$item_number, 'buyer'=>decrypt($id), 'success_user3'=>decrypt($id)])->get();
      $out4 = Enditem::select('*')->where(['end_num'=>$item_number, 'buyer'=>decrypt($id), 'success_user4'=>decrypt($id)])->get();
      $out5 = Enditem::select('*')->where(['end_num'=>$item_number, 'buyer'=>decrypt($id), 'success_user5'=>decrypt($id)])->get();

      // echo $out1[0]->end_num;
      if($out1->isNotEmpty()){
        Enditem::where(['end_num'=>$item_number,'buyer'=>decrypt($id)])->update([
          'success_user1'=> null,
          'buyer'=> $out1[0]->success_user2,
          'success_date' => date("Y-m-d",strtotime("+2 day" ))
        ]);
      }
      elseif ($out2->isNotEmpty()) {
        Enditem::where(['end_num'=>$item_number,'buyer'=>decrypt($id)])->update([
          'success_user2'=> null,
          'buyer'=> $out2[0]->success_user3,
          'success_date' => date("Y-m-d",strtotime("+2 day" ))
        ]);
      }
      elseif ($out3->isNotEmpty()) {
        Enditem::where(['end_num'=>$item_number,'buyer'=>decrypt($id)])->update([
          'success_user3'=> null,
          'buyer'=> $out3[0]->success_user4,
          'success_date' => date("Y-m-d",strtotime("+2 day" ))
        ]);
      }
      elseif ($out4->isNotEmpty()) {
        Enditem::where(['end_num'=>$item_number,'buyer'=>decrypt($id)])->update([
          'success_user4'=> null,
          'buyer'=> $out4[0]->success_user5,
          'success_date' => date("Y-m-d",strtotime("+2 day" ))
        ]);
      }
      elseif ($out5->isNotEmpty()) {
        Enditem::where(['end_num'=>$item_number,'buyer'=>decrypt($id)])->update([
          'success_user5'=> null,
          'buyer'=> null,
        ]);
        Item::where(['item_number'=>$item_number])->update([
          'success' => 0
        ]);
      }
      return redirect('/itemcheck');
    }
}
//
