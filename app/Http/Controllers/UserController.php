<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Session;
use Image;

class UserController extends Controller
{
    public function idcheck(Request $request){
      $id = $request->get('id');
      $data = User::select('ID')->where(['id'=>$id])->get()->count();
      return response()->json(['data'=>$data]);
    }

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
        'id' => $request->get('user_id'),
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
        session()->put('login_ID',encrypt($id));
        print_r("<script>alert('안녕하세요 \\n".$data[0]->NAME." 님 반갑습니다!');</script>");
        return view('main');
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
      return view('main');
    }

    public function mypage(Request $request){
      $id = session()->get('login_ID');
    //  $data=User::select('USER_IMAGE')->where(['user_image'=>$id])->get();
      $data = User::select('ID','EMAIL','EMAIL_DOMAIN','PHONE','BIRTHDAY','GENDER','USER_IMAGE')->where(['id'=>decrypt($id)])->get();
      return view('user.mypage', ['data'=>$data]);
      /*$data = User::where('ID','phone')->get();
      return view('user.mypage',['data'=> $data]);
      //  $data = User::all()->where(['id'=>$id])->get();
      //return view('user.mypage'['data'=>$data]);
      //  return $data;
      //return view('user.mypage', $data);
      //return User::make('ID')->with('ID', $data);
      // return view('user.mypage', ['ID' => $data]);
      //  echo  "$data";
      //  return User::all();
      //  $data=DB::table('ID')->get();
      //  return view('user.mypage',['ID'=>$data]);*/
    }

    public function mypage_update(Request $request){
      //$user_image = $filename;


      $id = session()->get('login_ID');
      $email = $request->get('str_email01');
      $email_domain = $request->get('str_email03');
      $phone = $request->get('phone');
      $birthday = $request->get('birthday');
      $gender = $request->get('gender');
      $user_image = $request->file('user_image');

      $extension= $user_image->getClientOriginalName();  //\time() . '.' .
      Image::make($user_image)->save(public_path('/img/user/' .$extension));

     if(empty($email))
       {
          /*session('error','이메일없음');
          return redirect('/mypage_update');*/
          return redirect()->back();
        }
      //  $user_image->save(src="/img/");
        //$user_image = $request->get('user_image_update');

      $update = User::/*select('email','email_domain','phone','birthday','gender')*/where(['id'=>decrypt($id)]/*'user_image_update'*/)->update([
      'email'=>$email,
      'email_domain'=>$email_domain,
      'phone'=>$phone,
      'birthday'=>$birthday,
      'gender'=>$gender,
      'user_image'=> $extension
      ]);

      return redirect('/mypage');
      //    print_r("<script>alert('정보가 수정되었습니다.');</script>");
      //    return view('/main');
    }
}
