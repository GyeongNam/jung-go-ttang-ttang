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

    public function sendd(Request $request){
      $sendd = $request->get('item_ki');
      $sendds = Item::select('item_number', 'item_picture', 'item_name', 'item_startprice')->where(['item_number'=>$sendd])->get();
      return view('bidding-info', [
        'sendd' => $sendds
      ]);
}
    public function biddingprice(Request $request){
      $bdp = $request->get('num_s');
      $id = session()->get('login_ID');
      $data = Auction::all()->where(['auction_itemnum' => $bdp, 'buyer_ID'=>$id ]);

      if(count($data)>0)
      {
        $update=Auction::where(['item_price'=>$bdp])->update([
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
    //  $price = Auction::all()->max('price')->get();
}
