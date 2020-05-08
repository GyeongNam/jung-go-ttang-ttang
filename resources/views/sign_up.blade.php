@extends('layout')

@section('title')
    중고땅땅 회원가입
@endsection

@section('content')
    <link rel="stylesheet" href ="css/sign_up.css"/>
    <link rel="stylesheet" href="css/head.css"/>
    <!-- J QUERY -->
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
  <div class="sign_up">
  <img src="main_img.png"  alt="로고" class="center-block">
  <form>
    <ul>
      <li>
        <label>아이디<br>
          <input type="text" id="new_id" required>
        </label>
      </li>

      <li>
        <label>비밀번호<br>
          <input type="password" name="userPwd" id="pwd1" class="form-control" required />
        </label>
      </li>

      <li>
        <label>비밀번호 확인<br>
          <input type="password" name="reuserPwd" id="pwd2" class="form-control" required />
        </label>
        <div class="alert alert-success" id="alert-success">비밀번호가 일치합니다.</div>
         <div class="alert alert-danger" id="alert-danger">비밀번호가 일치하지 않습니다.</div>

         <script type="text/javascript">
         $(function(){ $("#alert-success").hide();
         $("#alert-danger").hide();
         $("input").keyup(function(){ var pwd1=$("#pwd1").val();
         var pwd2=$("#pwd2").val(); if(pwd1 != "" || pwd2 != ""){ if(pwd1 == pwd2){
         $("#alert-success").show(); $("#alert-danger").hide();
         $("#submit").removeAttr("disabled"); }else{ $("#alert-success").hide();
         $("#alert-danger").show(); $("#submit").attr("disabled", "disabled"); } } }); });
         </script>

      </li>

      <li>
        <label>이름<br>
          <input type="text" id="new_name" required></label>
      </li>

      <li>
        <label>생년월일<br>
          <input type="date" id="birthday" name="birthday"
                 value="dualtime"
                 min="1930-01-01" max="2070-12-31">

      </li>

      <li>
        <label>성별<br>
          <select id = "sex">
            <option value="select">성별</option>
            <option value="m">남자</option>
            <option value="w">여자</option>
          </select>
        </label>
      </li>
      <label>이메일</label><br>
      <input type="text" name="str_email01" id="str_email01" style="width:141px"> @
      <input type="text" name="str_email02" id="str_email02" style="width:138px;" placeholder="직접입력" disabled value="">
      <select style="width:130px;margin-right:10px" name="selectEmail" id="selectEmail">
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
      <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
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
     <label> 휴대전화 </label><br>
     <select id = "sel_tel">
       <option value ="korea"> 대한민국 +82</option>
     </select>
     <br>
   </li>

   <li>
     <input type="tel" id="tel" size="32" placeholder=" 전화번호 입력" required>
     <button type = "button" id ="bt_secu">
       <b>인증번호 받기</b>
     </button>
   </li>

   <input type="text" id="security" size="61" placeholder=" 인증번호 입력하세요" required>
   <li>
     <button type="submit" class="sub" onclick="return to_submit();">
         <b>가입하기</b>
     </button>
   </li>
    </ul>
   </form>
  </div>

@endsection
