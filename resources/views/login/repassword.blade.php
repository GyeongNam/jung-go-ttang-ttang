@extends('layout.layout_main')

@section('title')
  비밀번호 재설정
@endsection

@section('css')
    <link rel="stylesheet" href="/css/login/login.css">

@section('content')
<script type="text/javascript">
function chkpw(){
  var pw = $("#pw").val();
  var num = pw.search(/[0-9]/g);
  var eng = pw.search(/[A-z]/ig);
  var spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
  var s_relult1 = $('#s_relult1');

  if(pw.length < 8 || pw.length > 20){
    if(pw.length == 0){
      s_relult1.text("영문, 숫자, 특수문자를 포함한 8자리 이상 입력하세요.");
      $("#sub").attr("disabled",true);
    }
    else{
     s_relult1.text("8자리 ~ 20자리 이내로 입력해주세요.");
     $("#sub").attr("disabled",true);
    }
    }
    else if(pw.search(/\s/) != -1){
     s_relult1.text("비밀번호는 공백 없이 입력해주세요.");
     $("#sub").attr("disabled",true);
   }
    else if(num < 0 || eng < 0 || spe < 0 ){
     s_relult1.text("영문,숫자, 특수문자를 혼합하여 입력해주세요.");
     $("#sub").attr("disabled",true);
   }
   else {
    s_relult1.text("");
    $("#sub").attr("disabled",false);
  }
}

function passwordcheck(){
  var password1 = $('#pw').val();
  var password2 = $('#repw').val();
  var s_relult2 = $('#s_relult2');
  if (password1 == password2) {
    if (password2 == 0) {
      s_relult2.text("");
    }
    else {
      compare_result = true;
      s_relult2.text('비밀번호가 일치합니다.');
      $("#sub").attr("disabled",false);
    }
  }
  else {
    compare_result = false;
     s_relult2.text('비밀번호가 일치하지 않습니다.');
     $("#sub").attr("disabled",true);
  }
}

</script>
    <div class="login_layout">
      <div class="login_form">
        <form action="/user_pwd_update/{{$id}}" method="post">
         @csrf
          <ul>
            <li>
              <img src="/img/tangtang.png"  alt="로고" class="center-block">
            </li>
            <li>
              <label><strong>NEW Password(비밀번호)</strong><br>
                <input type="password" name="PW" id="pw" placeholder="비밀번호" onKeyup="chkpw()" required><br>
              </label>
              <p><spen id=s_relult1>영문, 숫자, 특수문자를 포함한 8자리 이상 입력하세요.</spen></p>
            </li>
            <li>
              <label><strong>RE Password(비밀번호 확인)</strong><br>
                <input type="password" name="REPW" id="repw" placeholder="비밀번호 확인" onKeyup="passwordcheck()" required><br>
              </label>
              <p><spen id= "s_relult2"></spen></p>
            </li>
            <li>
            <button type="submit" id="sub" name="login" onclick="return to_submit();">비밀번호 변경하기</button>
          </li>
         </ul>
        </form>
      </div>
    </div>

@endsection
