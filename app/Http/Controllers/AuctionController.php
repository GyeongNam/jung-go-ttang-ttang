<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auction;
use App\Item;


class AuctionController extends Controller
{
    public function auction_in(Request $request){
      $auction = new Auction([
        'buyer_ID' => $request->get('seller_id'),
        'item_price' => $request->get('price'),
        'auction_itemnum' =>$request->get('')
      ]);
      $auction->save();
    }

    public function sendd($item_number){
      $sendds = Item::select('item_number', 'item_picture', 'item_name', 'item_startprice')->where(['item_number'=>$item_number])->get();
      $max = Auction::select('item_price')->where(['auction_itemnum'=>$item_number])->get();
      $maxs =  $max->max('item_price');
      return view('bidding-info', [
        'sendd' => $sendds,
        'max' => $maxs
      ]);
    }

    public function biddingprice(Request $request){
      $bdp = $request->get('num_s');
      $id = session()->get('login_ID');
      $data = Auction::select('*')->where(['auction_itemnum' => $bdp, 'buyer_ID'=>decrypt($id)])->get();
      if(count($data)>0)
      {
        $update=Auction::where(['auction_itemnum' => $bdp, 'buyer_ID'=>decrypt($id)])->update([
          'item_price' => $request->get('bdinput')
        ]);
        return redirect('/');
      }
      else {
        $action = new Auction([
          'buyer_ID' => decrypt($id),
          'item_price' =>$request->get('bdinput'),
          'auction_itemnum' => $bdp
        ]);
        $action->save();
        return redirect('/');
      }
    }

}
//
