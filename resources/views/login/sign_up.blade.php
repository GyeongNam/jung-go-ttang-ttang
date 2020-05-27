@extends('layout.layout_main')

@section('title')
  중고땅땅-회원가입
@endsection

@section('css')
  <link rel="stylesheet" href ="/css/login/sign_up.css"/>
@endsection

@section('js')
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
function mainsends(){
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: " /mail",
      type: "get",
  });
}


function check(){
  var userid = $('#new_id').val();
  var id_result = $('#id_result').val();

  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: " /idcheck",
      dataType: 'json',
      data: {id:userid},
      type: "POST",
      success:function(data){
        console.log("성공");

      },
      error : function(){
        console.log("실패");

      }
  });
}

var compare_result = false;
function passwordcheck(){
  var password1 = $('#pwd1').val();
  var password2 = $('#pwd2').val();
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

function chkpw(){
  var pw = $("#pwd1").val();
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



 function checkValue(){
    var form = document.userinfo;
    var emil = $("#str_email01").val;
    var pw = $("#pwd1").val();
    var num = pw.search(/[0-9]/g);
    var eng = pw.search(/[A-z]/ig);
    var spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
    var phoneJ =/^\d{3}\d{3,4}\d{4}$/;
    var nameJ = /^[가-힣/\s/]{2,6}$/;
    var mailJ =  /[`~!@@#$%^&*|₩₩₩'₩";:₩/?/\s/]/;




    if (!form.user_id.value) {
      alert("아이디를 입력하세요.");
      return false;
    }
    if (!form.userPwd.value) {
      alert("비밀번호를 입력하세요.");
      return false;
    }
    if (!form.birthday.value) {
      alert("생년월일을 입력하세요.");
      return false;

    }
    if (form.userPwd.value != form.reuserPwd.value) {
      alert("비밀번호가 일치하지 않습니다.");
      return false;
    }
    if (!nameJ.test($("#new_name").val())) {
      alert("이름을 다시 입력하세요");
      return false;

    }
    if (!phoneJ.test($("#tel").val())) {
      alert("올바른 전화번호가 아닙니다.");
      return false;

    }
    if (mailJ.test($("#str_email01").val())) {
      alert("올바른 이메일이 아닙니다.");
      return false;

    }
    if(pw.length < 8 || pw.length > 20){
       alert("비밀번호를 8자리 ~ 20자리 이내로 입력해주세요.");
       return false;
    }

  }


</script>

@endsection

@section('content')
  <div class="sign_up">
    <div class="sign_form">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <form action="{{ url('/singup')}}" method="post" type="submit" name="userinfo" onsubmit="return checkValue()"

        @csrf
        <ul>
          <li>
            <img src="/img/tangtang.png"  alt="로고" class="center-block">
          </li>
          <li>
            <label><strong>아이디</strong><br>
              <input type="text" name="user_id" id="new_id" onkeyup="check()" minlength=6 maxlength=20 required class="id_b">
              <p><spen id= "id_result" >아이디 중복확인</spen></p>
            </label>
          </li>

          <li>
            <label><strong>비밀번호</strong><br>
              <input type="password" name="userPwd" id="pwd1" onKeyup="chkpw()" class="form-control" required>

            </label>
            <p><spen id=s_relult1>영문, 숫자, 특수문자를 포함한 8자리 이상 입력하세요.</spen></p>
          </li>
          <li>
            <label><strong>비밀번호 확인</strong><br>
              <input type="password" name="reuserPwd" id="pwd2"  onKeyup="passwordcheck()" class="form-control" required>
            </label>
            <p><spen id= "s_relult2"></spen></p>


          </li>

          <li>
            <label>
              <strong>이름</strong><br>
              <input type="text" name="userName" id="new_name" required>
            </label>
          </li>

          <li>
            <label>
              <strong>생년월일</strong><br>
              <input type="date" id="birthday" name="birthday"
                     value="dualtime"
                     min="1930-01-01" max="2050-12-31" required
                     >
            </label>
          </li>

          <li>
            <label><strong>성별</strong><br>
              <select name="gender" id = "gender" required="required">
                <option value="m">남자</option>
                <option value="w">여자</option>
              </select>
            </label>
          </li>
          <li>
            <label><strong>이메일</strong></label><br>
            <input type="text" name="str_email01" id="str_email01" required="required">
            <input type="text" name="str_email02" id="str_email02" placeholder="직접입력" disabled value="">
            <select name="str_email03" id="selectEmail" required="required">
              <option value="1">직접입력</option>
              <option value="naver.com" selected>naver.com</option>
              <option value="hanmail.net">hanmail.net</option>
              <option value="hotmail.com">hotmail.com</option>
              <option value="nate.com">nate.com</option>
              <option value="yahoo.co.kr">yahoo.co.kr</option>
              <option value="empas.com">empas.com</option>
              <option value="dreamwiz.com">dreamwiz.com</option>
              <option value="freechal.com">freechal.com</option>
              <option value="lycos.co.kr">lycos.co.kr</option>
              <option value="korea.com">korea.com</option>
              <option value="gmail.com">gmail.com</option>
              <option value="hanmir.com">hanmir.com</option>
              <option value="paran.com">paran.com</option>
            </select>
          </li>

          <script type="text/javascript">
           //이메일 입력방식 선택
           $('#selectEmail').change(function()
           { $("#selectEmail option:selected").each(function ()
           { if($(this).val()== '1'){ //직접입력일 경우
             $("#str_email02").val('');
            //값 초기화
            $("#str_email02").attr("disabled",false); //활성화
            }else{    //직접입력이 아닐경우
            $("#str_email02").val($(this).text()); //선택값 입력
            $("#str_email02").attr("disabled",true); //비활성화
             }
           });
         });
       </script>
       <li>
         <label><strong>휴대전화</strong></label><br>
         <select id = "sel_tel">
           <option value ="korea"> 대한민국 +82</option>
         </select>
         <br>
       </li>

       <li>
         <input type="tel" name="tel" id="tel" placeholder=" 전화번호 입력" required maxlength=11 >
         <button onclick="mainsends()" type ="button" id ="bt_secu"><b>인증번호 전송</b></button>
       </li>

       <input type="text" id="security" size="61" placeholder=" 인증번호 입력하세요" required>
       <li>
         <button  id="sub" onclick="return join_member();" >
           <b>가입하기</b>
         </button>

       </li>
        </ul>
       </form>
    </div>
  </div>
@endsection
