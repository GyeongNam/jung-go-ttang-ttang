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
use App\Item;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Qna;


class UserController extends Controller
{
  public function idcheck(Request $request){
    $id = $request->input('id');
    $data = User::select('ID')->where(['id'=>$id])->get()->count();
    return response()->json(['data'=>$data]);
  }

  public function store(Request $request){
    $p1 = $request->input('str_phone01');
    $p2 = $request->input('str_phone02');
    $p3 = $request->input('str_phone03');
    $p1.$p2.$p3;
    $user = new user([
      'id' => $request->input('user_id'),
      'password'=> $request->input('userPwd'),
      'name' => $request->input('userName'),
      'birthday'=> $request->input('birthday'),
      'gender'=> $request->input('gender'),
      'email'=> $request->input('str_email01'),
      'email_domain'=>$request->input('str_email02'),
      'phone'=>$p1.$p2.$p3
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
      $page = session()->get('page');
      User::where(['id'=> $id])->update([
        'login_record'=> $request->input(date("Y-m-d"))]);
        return redirect($page);
      }
      else {
        print_r("<script>alert('없는 아이디거나 틀린 비밀번호입니다.');</script>");
        return view('login.login');
      }
    }

    public function logout(Request $request){
      session()->forget('login_ID');
      return redirect('/');
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
      echo ("<script>alert('유효하지 않는 링크입니다. 메일을 다시보내세요');</script>");
      return view('login.find_act');
    }

    public function user_pwd_update(Request $request, $id){
      $ids = decrypt($id);
      $data = User::where(['id'=>$ids])->update([
        'password' => $request->input('PW')
      ]);
      return view('main');
    }

    public function manager(Request $request){
      $mana = User::select('ID','name','birthday','gender','phone','email','email_domain','created_at')->get();
      return view('/manager_user',[
        'mana'=>$mana
      ]);
    }

    // @url '/manager_user_info/$id'
    public function managerINFO(Request $request,$id){
      $count = DB::table('banlog')->where(['user_id'=>$id])->count();
      $mana = User::select('ID','name','birthday','gender','phone','email','email_domain','created_at')->where(['id'=>$id])->get();
      $maif = Item::leftjoin('auction', 'items.item_number','=', 'auction.auction_itemnum')->select('item_number','item_name','item_price','buyer_ID')->where(['buyer_ID'=>$id])->get();


      return view('/manager_user_info',[
        'mana'=>$mana,
        'maif'=>$maif,
        'count'=>$count
      ]);
    }

    public function warning(Request $request,$id){

      $ids = DB::table('banlog')->select('*')->where(['user_id'=>$id])->get();
      if (count($ids) == 2) {
        DB::table('bantime')->insert([
          'user_id'=>$id,
          'ban'=> 1,
          'ban_startdate'=>date("Y-m-d"),
          'ban_enddate' =>date("Y-m-d",strtotime(" +1day" ))
        ]);
        DB::table('banlog')->insert([
          'user_id' => $id
        ]);
      }
      else {
        $ban = DB::table('banlog')->insert([
          'user_id' => $id
        ]);
      }
      if(count($ids)>1)
      {
        return redirect('/manager_policy');
      }
      else
      {
        return back();
      }

    }
    public function qna(Request $request){
      $id = session()->get('login_ID');
      if(session()->has('login_ID') != 1){
        $data = [];
      }
      else {
        $data = User::select('ID')->where(['id'=> decrypt($id)])->get();
      }
      $qna=Qna::select('*')->get();

      return view('Servicecenter', [
        'data'=> $data,
        'qna'=>$qna
      ]);
    }

    public function qna1(Request $request){
      $item = new qna([
        'qna_text' => $request->input('qnatext'),
        'qna_pass' => $request->input('qnapass'),
        'qna_title' =>$request->input('nanana'),
        'qna_id'=> decrypt(session()->get('login_ID'))
      ]);
      $item->save();
      return redirect('/Servicecenter');
    }
    public function qnacont(Request $request){
      $pwd = $request->input('qnapassinput');
      $data = Qna::select('qna_pass')->get();
      if($pwd==$data){

        return view('qna');
      }
      else {
        print_r("<script>alert('비밀번호가 다릅니다.');</script>");
        return back();
      }
      public function ban(Request $request,$id){

        $date_de = DB::table('bantime')->select('ban_enddate')->where(['user_id'=>$id])->get();
        $rede =  strtotime(date("Y-m-d"));

        if ( strtotime($date_de) < $rede) {
          DB::table('bantime')->where(['user_id'=> $id])->delete();
          $delete = DB::table('banlog')->where([
            'user_id' => $id ])-> delete();
          }
          return back();
        }

        public function graph(Request $request){
          $calander=DB::table('users')->select('*')->get();

          // $calander= User::select('updated_at')->where(['id'=>$id])->get();

          $calander=DB::table('users')->select('*')->orderBy('updated_at', 'desc')->get();

          $data = Analytics::fetchTotalVisitorsAndPageViews(Period::days(29));
          $dat=0;
          for($i=0; $i<count($data); $i++){
            $dat += Arr::get($data[$i], 'visitors');
          }

          $data2 = Analytics::fetchTotalVisitorsAndPageViews(Period::days(6));
          $dat2=0;
          for($i=0; $i<count($data2); $i++){
            $dat2 += Arr::get($data2[$i], 'visitors');
          }

          $data1 = Analytics::fetchTotalVisitorsAndPageViews(Period::days(0));
          $dat1 =Arr::get($data1[0], 'visitors');

          $analyticsData1 = Analytics::performQuery(Period::days(7),'ga:sessions',
          [
            'metrics'=>'ga:pageviews',
            'dimensions'=>'ga:contentGroup1'
          ]
        );

        $ta2 =Arr::get($analyticsData1,'rows.1');
        $ta3 =Arr::get($analyticsData1,'rows.2');
        $ta4 =Arr::get($analyticsData1,'rows.3');
        $ta5 =Arr::get($analyticsData1,'rows.4');
        $ta6 =Arr::get($analyticsData1,'rows.5');
        $ta7 =Arr::get($analyticsData1,'rows.6');
        $ta8 =Arr::get($analyticsData1,'rows.7');
        $ta9 =Arr::get($analyticsData1,'rows.8');
        $ta10 =Arr::get($analyticsData1,'rows.9');
        $ta11 =Arr::get($analyticsData1,'rows.10');
        $ta12 =Arr::get($analyticsData1,'rows.11');
        $ta13 =Arr::get($analyticsData1,'rows.12');
        $ta14 =Arr::get($analyticsData1,'rows.13');
        $ta15 =Arr::get($analyticsData1,'rows.14');

        $ana=Analytics::performQuery(Period::days(29),'ga:sessions',
        [
          'metrics'=>'ga:timeOnPage',
          'dimensions'=>'ga:pagePath',
          'sort'=>'-ga:timeOnPage',
          'max-results'=>'5'
        ]);

        $ana1=Arr::get($ana,'rows.0');
        $ana2=Arr::get($ana,'rows.1');
        $ana3=Arr::get($ana,'rows.2');
        $ana4=Arr::get($ana,'rows.3');
        $ana5=Arr::get($ana,'rows.4');



        return view('manager_main',[
          'data'=>$data,
          'data1'=>$data1,
          'dat'=>$dat,
          'dat1'=>$dat1,
          'dat2'=>$dat2,
          'calander'=>$calander,
          'ta2'=>$ta2,'ta3'=>$ta3,
          'ta4'=>$ta4,'ta5'=>$ta5,
          'ta6'=>$ta6,'ta7'=>$ta7,
          'ta8'=>$ta8,'ta9'=>$ta9,
          'ta11'=>$ta11,'ta10'=>$ta10,
          'ta12'=>$ta12,'ta13'=>$ta13,
          'ta14'=>$ta14,'ta15'=>$ta15,
          'ana1'=>$ana1,'ana2'=>$ana2,
          'ana3'=>$ana3, 'ana4'=>$ana4,
          'ana5'=>$ana5
        ]);
      }
      public function policy(Request $request){
        $policy = DB::table('bantime')
        ->join('users','users.id','=','bantime.user_id')
        ->select('users.id','users.name','bantime.*')
        ->get();
        return view('/manager_policy',[
          'policy'=> $policy
        ]);
      }
      public function managerlogin(Request $request){
        $id = $request->input('ID1');
        $pw = $request->input('PW1');
        $data = DB::table('managerid')->select('id','password')->where(['id'=>$id ,'password'=>$pw])->get();
        if(count($data)>0){
          session()->put('login_ID',encrypt($id));

          return redirect('/manager_main');
        }
        else {
          print_r("<script>alert('없는 아이디거나 틀린 비밀번호입니다.');</script>");
          return view('/manager_login');
        }
      }
      public function managerlogout(Request $request){
        session()->forget('login_ID');
        return redirect('/manager_login');
      }
    }
