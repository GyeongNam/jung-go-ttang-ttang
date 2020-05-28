<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Mail\SendMail;
use App\User;
use DB;
use Session;
use Image;

class UserController extends Controller
{
    public function mailsend(Request $request){
      $mail = $request->get('mail');
      $random = $request->get('random');
      $details = [
        'title' => '안녕하세요 고객님',
        'body' => '인증번호를 확인하세요',
        'num' => $random
      ];
      \Mail::to($mail)->send(new SendMail($details));
    }

    public function idcheck(Request $request){
      $id = $request->get('id');
      $data = User::select('ID')->where(['id'=>$id])->get()->count();
      return response()->json(['data'=>$data]);
    }

    public function store(Request $request){
      $user = new user([
        'id' => $request->get('user_id'),
        'password'=> $request->get('userPwd'),
        'name' => $request->get('userName'),
        'birthday'=> $request->get('birthday'),
        'gender'=> $request->get('gender'),
        'email'=> $request->get('str_email01'),
        'email_domain'=>$request->get('str_email02'),
      	'phone'=> $request->get('tel')
      ]);
      $user->save();
      return view('login.login');
    }

    public function loging(Request $request){
      $id = $request->get('id');
      $pwd = $request->get('PW');
      $data = User::select('ID','PASSWORD','NAME')->where(['id'=>$id,'password'=>$pwd])->get();

      if(count($data)>0){
        session()->put('login_ID',encrypt($id));
        print_r("<script>alert('안녕하세요 \\n".$data[0]->NAME." 님 반갑습니다!');</script>");
        return view('main');
      }
      else {
        print_r("<script>alert('없는 아이디거나 틀린 비밀번호입니다.');</script>");
        return view('login.login');
      }
    }

    public function logout(Request $request){
      session()->forget('login_ID');
      print_r("<script>alert('정상적으로 로그아웃 되었습니다.');</script>");
      return view('main');
    }

    public function mypage(Request $request){
      $id = session()->get('login_ID');
      $data = User::select('ID','EMAIL','EMAIL_DOMAIN','PHONE','BIRTHDAY','GENDER','USER_IMAGE')->where(['id'=>decrypt($id)])->get();
      return view('user.mypage', ['data'=>$data]);
    }

    public function mypage_update(Request $request){
      $id = session()->get('login_ID');
      $email = $request->get('str_email01');
      $email_domain = $request->get('str_email02');
      $phone = $request->get('phone');
      $birthday = $request->get('birthday');
      $gender = $request->get('gender');
      $user_image = $request->file('user_image');

      $extension= $user_image->getClientOriginalName();  //\time() . '.' .
      Image::make($user_image)->save(public_path('/img/user/' .$extension));

     if(empty($email&&$email_domain&&$phone&&$birthday&&$gender))
       {
          return redirect()->back();
        }

      $update = User::where(['id'=>decrypt($id)])->update([
      'email'=>$email,
      'email_domain'=>$email_domain,
      'phone'=>$phone,
      'birthday'=>$birthday,
      'gender'=>$gender,
      'user_image'=> $extension
      ]);

      return redirect('/mypage');
    }
}
