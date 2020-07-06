<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\WebsocketEvent;
use App\Message;
use App\User;
use DB;

class MessageController extends Controller
{
    public function mstore(Request $request){

      return response()->json([
        'hello' => 'world'
      ]);
    }

    public function muser(){
      $id =decrypt(session()->get('login_ID'));
      broadcast(new WebsocketEvent('ccit_a hello~'));
      $user = User::select('*')->where('ID', "<>" , $id)->get();
      $userID = User::select('ID')->where('ID', "<>" , $id)->get();

      // $message_input = DB::table('chatroom as a1')->
      // join('chatroom as a2', 'a1.user2_ID', '=', 'a2.user1_ID')->
      // join('chatroom as a3', 'a3.user2_ID', '=', 'a1.user1_ID')->
      // get();
      $message_out = collect([]);
      for($i = 0; $i<count($userID); $i++){
        $message_out->push( Message::select('messege','user1_ID','created_at')->where([
        ['user2_ID', '=', $id],
        ['user1_ID', '=', $userID[$i]->ID]
        ])->orderBy('created_at', 'desc')->get());
      }
      // echo $message_out ;

      // echo $message_out;

      // echo $message_input.'<br>';
      // echo $userID;

      return view('cahtroom', [
        'messageout' => $message_out,
        'user' => $user,
        'userID' => $userID
      ]);
    }
}
