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
        'buyer_ID' => $request->get(''),
        'item_price' => $request->get('price'),
        'auction_itemnum' =>$request->get('')
      ]);
      $auction->save();
    }

    public function auction_view(Request $request){
      $price = Auction::all()->max('price')->get();
      return view('입찰정보', [
        ''
      ]);
    }
}
