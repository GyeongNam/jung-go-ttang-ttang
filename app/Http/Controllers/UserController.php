<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Mail\SendMail;
use \App\Mail\IDselect;
use \App\Mail\PWselect;
use App\User;
use DB;
use Session;
use Image;

class UserController extends Controller
{
    public function mailsend(Request $request){
      $mail = $request->input('mail');
      $random = $request->input('random');
      $details = [
        'title' => '안녕하세요 고객님',
        'body' => '인증번호를 확인하세요',
        'num' => $random
      ];
      Mail::to($mail)->send(new SendMail($details));
    }

    public function idcheck(Request $request){
      $id = $request->input('id');
      $data = User::select('ID')->where(['id'=>$id])->get()->count();
      return response()->json(['data'=>$data]);
    }

    public function store(Request $request){
      $user = new user([
        'id' => $request->input('user_id'),
        'password'=> $request->input('userPwd'),
        'name' => $request->input('userName'),
        'birthday'=> $request->input('birthday'),
        'gender'=> $request->input('gender'),
        'email'=> $request->input('str_email01'),
        'email_domain'=>$request->input('str_email02'),
      	'phone'=> $request->input('tel')
      ]);
      $user->save();
      return view('login.login');
    }

    public function loging(Request $request){
      $id = $request->input('id');
      $pwd = $request->input('PW');
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

    public function user_binding(Request $request) {
      $id = session()->get('login_ID');
      $data = User::select('EMAIL','EMAIL_DOMAIN','PHONE','BIRTHDAY','GENDER','USER_IMAGE')->where(['id'=>decrypt($id)])->get();
      $item_picturefront = User::select('USER_IMAGE')->where(['id'=>decrypt($id)])->get();;

      return view('user.mypage_update', ['data'=>$data]);
    }

    public function mypage_update(Request $request){
      $id = session()->get('login_ID');
      $email = $request->input('str_email01');
      $email_domain = $request->input('str_email02');
      $phone = $request->input('phone');
      $birthday = $request->input('birthday');
      $gender = $request->input('gender');

      if($request->hasFile('item_picturefront')){
        $user_image = $request->file('user_image');
        $extension= $user_image->getClientOriginalName();
        Image::make($user_image)->save(public_path('/img/user/' .$extension));
      }
      else {
        $imgselect = User::select('USER_IMAGE')->where(['id'=>decrypt($id)])->get();;
        $extension = $imgselect[0]->USER_IMAGE;
      }
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

    public function selectid(Request $request){
      $name = $request->input('names');
      $phone = $request->input('phone');
      $data = User::select('ID', 'email', 'email_domain')->where(['name'=> $name, 'phone'=> $phone])->get();
      $datas = count($data);
      if($datas>0){
        $mail = $data[0]->email.'@'.$data[0]->email_domain;
        $details = [
          'title' => '안녕하세요 고객님',
          'body' => '아이디를 확인하세요',
          'id' => $data[0]->ID
        ];
        Mail::to($mail)->send(new IDselect($details));
      }
      return response()->json(['data'=>$datas]);
    }

    public function selectpw(Request $request){
      $id = $request->input('id');
      $phone = $request->input('phone');

      $data = User::select('ID', 'email', 'email_domain')->where(['id'=> $id, 'phone'=> $phone])->get();
      $datas = count($data);

      if($datas>0){
        $mail = $data[0]->email.'@'.$data[0]->email_domain;
        $idlink = encrypt($data[0]->ID);
        $details = [
          'title' => '안녕하세요 고객님',
          'body' => '비밀번호를 확인하세요',
          'id' => $idlink
        ];
        User::where(['id'=>$id])->update(['password'=>$idlink]);
        Mail::to($mail)->send(new PWselect($details));
      }
      return response()->json(['data'=>$datas]);
    }

    public function user_repwd($id){
      $data = User::select('id')->where(['password'=>$id])->get()->count();
      if($data>0){
        return view('login.repassword', ['id'=>$id]);
      }
      print_r("<script>alert('유효하지 않는 링크입니다.');</script>");
    }

    public function user_pwd_update(Request $request, $id){
      $ids = decrypt($id);
      $data = User::where(['id'=>$ids])->update([
        'password' => $request->input('PW')
      ]);
      return view('main');
    }
}
