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

      $id = decrypt(session()->get('login_ID'));
      // $user = User::select('*')->where('ID', "<>" , $id)->get();
      $userID = Message::select('user1_ID')->where('user2_ID', '=', $id)->get();
      $message = Message::select('*')->orderBy('created_at')->get();
      $messages = Message::select('*')->orderBy('created_at', 'desc')->get();

      // echo '\''.$message.'\'';
      // WebsocketEvent::dispatch(
      //   $message
      //   // '\''.$message.'\''
      // );

      return view('cahtroom', [
        // 'user' => $user,
        'userID' => $userID,
        'userIDct' => count($userID),
        'message' => $message,
        'messages' => $messages,
        // 'messageuser' => $messageuser
      ]);
    }

    public function messegesend(Request $request){
        $myid = decrypt(session()->get('login_ID'));
        $id = $request->input('id');
        $messege = $request->input('messege');

        $Message_save = Message::create([
          'messege' => $messege,
          'user1_ID'=> $myid,
          'user2_ID'=> $id
        ]);
        // $Message_saves = $Message_save->toArray();

        WebsocketEvent::dispatch(
            $Message_save->messege ,
            $Message_save->user1_ID,
            $Message_save->user2_ID,
            $Message_save->created_at->format('Y-m-d H:i:s')
        );

        return response()->json([
          'data' => $Message_save,
          'datas' => $Message_save->messege,
          'date' => $Message_save->created_at->format('Y-m-d H:i:s')
        ]);
    }
}
