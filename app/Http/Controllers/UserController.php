<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Session;

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
      $data = /*DB::table('users')->*/User::select('ID','PASSWORD','NAME')->where(['id'=>$id,'password'=>$pwd])->get();

      if(count($data)>0){
        session()->put('login_ID',$id);
        print_r("<script>alert('안녕하세요 \\n".$data[0]->NAME." 님 반갑습니다!');</script>");
        return view('layout.layout_main');
        //print_r(session()->all());
      }
      else {
        print_r("<script>alert('없는 아이디거나 틀린 비밀번호입니다.');</script>");
        return view('login.login');
      }
    }

    public function logout(Request $request){
      session()->forget('login_ID');
      print_r("<script>alert('정상적으로 로그아웃 되었습니다.');</script>");
      return view('layout.layout_main');
    }
}
