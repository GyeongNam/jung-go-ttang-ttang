@extends('layout.layout_main')

@section('title')
  중고땅땅-회원가입
@endsection

@section('css')
  <link rel="stylesheet" href ="/css/login/sign_up.css"/>
@endsection

@section('js')
  <script>

  // 아이디 유효성 검사(1 = 중복 / 0 != 중복)
	$("#new_id").blur(function() {
		// id = "id_reg" / name = "userId"
		var user_id = $('#new_id').val();
		$.ajax({
			url : '${pageContext.request.contextPath}='+ user_id,
			type : 'get',
			success : function(data) {
				console.log("1 = 중복o / 0 = 중복x : "+ data);

				if (data == 1) {
						// 1 : 아이디가 중복되는 문구
						$("#id_result").text("사용중인 아이디입니다 :p");

						$("#join_member").attr("disabled", true);
					} else {

						if(idJ.test(user_id)){
							// 0 : 아이디 길이 / 문자열 검사
							$("#id_check").text("");
							$("#join_member").attr("disabled", false);

						} else if(user_id == ""){

							$('#id_result').text('아이디를 입력해주세요 :)');

							$("#join_member").attr("disabled", true);

						} else {

							$('#id_result').text("아이디는 소문자와 숫자 4~12자리만 가능합니다 :) :)");

							$("#reg_submit").attr("disabled", true);
						}

					}
				}, error : function() {
						console.log("실패");
				}
			});
		});



  var compare_result = false;
  function passwordcheck(){
    var password1 = $('#pwd1').val();
    var password2 = $('#pwd2').val();
    var s_relult2 = $('#s_relult2');
    if (password1 == password2) {
      if (password2 == 0) {
        s_relult2.text("");
      }else {
        compare_result = true;
        s_relult2.text('비밀번호가 일치합니다.');
      }

    }else {
      compare_result = false;
       s_relult2.text('비밀번호가 일치하지 않습니다.');
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
      }else {


       s_relult1.text("8자리 ~ 20자리 이내로 입력해주세요.");
     }
    }else if(pw.search(/\s/) != -1){
       s_relult1.text("비밀번호는 공백 없이 입력해주세요.");

    }else if(num < 0 || eng < 0 || spe < 0 ){
       s_relult1.text("영문,숫자, 특수문자를 혼합하여 입력해주세요.");

    }else {
      s_relult1.text("");

    }

   }

  function join_member(){

    if (compare_result == true) {
      alert("비밀번호가 일치합니다.")
    }else {
      alert("비밀번호가 일치하지 않습니다.");
      return;
    }


  }
 </script>

@endsection

@section('content')
  <div class="sign_up">
    <div class="sign_form">
      <form action="{{ url('/singup')}}" method="post" type="submit">
        @csrf
        <ul>
          <li>
            <img src="/img/tangtang.png"  alt="로고" class="center-block">
          </li>
          <li>
            <label><strong>아이디</strong><br>
              <input type="text" name="user_id" id="new_id" onkeyup="id_check" maxlength=10 required class="id_b">
              <p><spen id= "id_result"></spen></p>
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
                     min="1930-01-01" max="2070-12-31"
                     >
            </label>
          </li>

          <li>
            <label><strong>성별</strong><br>
              <select name="gender" id = "gender">
                <option value="select">성별</option>
                <option value="m">남자</option>
                <option value="w">여자</option>
              </select>
            </label>
          </li>
          <li>
            <label><strong>이메일</strong></label><br>
            <input type="text" name="str_email01" id="str_email01" >
            <input type="text" name="str_email02" id="str_email02" placeholder="직접입력" disabled value="">
            <select name="str_email03" id="selectEmail">
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
         <label><strong>휴대전화</strong></label><br>
         <select id = "sel_tel">
           <option value ="korea"> 대한민국 +82</option>
         </select>
         <br>
       </li>

       <li>
         <input type="tel" name="tel" id="tel" placeholder=" 전화번호 입력" required>
         <button type = "button" id ="bt_secu"><b>인증번호 전송</b></button>
       </li>

       <input type="text" id="security" size="61" placeholder=" 인증번호 입력하세요" required>
       <li>
         <button  id="sub" onclick="join_member" >
           <b>가입하기</b>
         </button>

       </li>
        </ul>
       </form>
    </div>
  </div>
@endsection
