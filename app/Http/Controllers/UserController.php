<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;

class UserController extends Controller
{
    /*public function create(){
      return view('login.sign_up');
    }*/

    public function store(Request $request){
      /*DB::table('users')->insert(
        'id' => $request->get('userid'),
        'password'=> $request->get('userPwd'),
        'name' => $request->get('userName'),
        'birthday'=> $request->get('birthday'),
        'gender'=> $request->get('gender'),
        'email'=> $request->get('selectEmail'),
      	'phone'=> $request->get('tel')

        return redirect()->back;
      );*/
      $user = new user([
        'id' => $request->get('userid'),
        'password'=> $request->get('userPwd'),
        'name' => $request->get('userName'),
        'birthday'=> $request->get('birthday'),
        'gender'=> $request->get('gender'),
        'email'=> $request->get('str_email01'),
        'email_domain'=>$request->get('str_email03'),
      	'phone'=> $request->get('tel')
      ]);
      $user->save();
      //return redirect()->back();
      return view('login.login');
    }
    public function loging(Request $request){
      $id = $request->get('id');
      $pwd = $request->get('PW');
      $data = /*DB::table('users')->*/User::where(['id'=>$id,'password'=>$pwd])->get();

      if(count($data)>0){
        print_r("로그인 성공 회원정보:".$data);
      }
      else {
        print_r("로그인 실패");
      }
    }
}
