<!DOCTYPE html>
<html lang="ko">
  <head>
    <title> 중고땅땅-회원가입</title>
    <meta charset="utf-8">
    <style>
      body{
        background-color: "rgb(232, 108, 210)";

      }


      *{
        margin:0;
        padding:0;
      }

      div{
        width:460px;
        margin:30px auto;
      }

      li{
        list-style: none;
        margin: 15px 0;
      }

      input, select{
        height:50px;
      }

      select #month{
        width:172px;
        height: 54px;
      }

      label{
        line-height: 30px;
      }

       button{
         font-size: 15px;
         cursor: pointer;
         color:white;
         display: block;
         background-color:rgb(199, 71, 163) ;
         border:0px solid rgb(199, 71, 163);
        }

        #bt_secu{
          padding: 17px 30px; float:right;
        }

        .sub{
          padding:20px 200px;
        }

        lebel{
          font-weight: bold;
        }

        #sex{
          width:460px;
        }

        #tel{
          width:295px;
        }

        #sel_tel{
          width:460px;
        }

        small{
          color:rgb(199, 71, 163);
        }
      </style>

    <!-- J QUERY -->
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>

    <!-- Bootstarp START -->
    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- 부가적인 테마 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- Bootstarp END -->

  </head>

  <body class="bg-danger">
    <div>
    <img src="main_img.png"  alt="로고" width="35%"  margin:"auto" class="center-block">
    <form>
      <ul>
        <li>
          <label>아이디<br>
            <input type="text" id="new_id" size="61" required>
          </label>
        </li>

        <li>
          <label>비밀번호<br>
            <input type="password" id="new_pw" size="61" required>
          </label>
        </li>

        <li>
          <label>비밀번호 확인<br>
            <input type="password" id="new_ppw" size="61" required>
          </label>
        </li>

        <div id="notice"></div>

        <li>
          <label>이름<br>
            <input type="text" id="new_name" size="61" required>
          </label>
        </li>

        <li>
          <label>생년월일<br>
            <input type="number" id="year" size="15" placeholder="년(4자)" required>
          </label>

          <select id ="month">
            <option value="1">1월</option>
            <option value="2">2월</option>
            <option value="3">3월</option>
            <option value="4">4월</option>
            <option value="5">5월</option>
            <option value="6">6월</option>
            <option value="7">7월</option>
            <option value="8">8월</option>
            <option value="9">9월</option>
            <option value="10">10월</option>
            <option value="11">11월</option>
            <option value="12">12월</option>
         </select>
          <input type ="number" id="day" size="15" placeholder="   일" required>
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

        <li>
          <label>본인 확인 이메일<small>(선택)</small><br>
            <input type="email" id="em" size ="61" placeholder="  선택입력">
          </label>
        </li>

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
  </body>
</html>

<script type="text/javascript">
  // $("#new_pw").keyup(function (){
  //   alert(  $("#new_pw").val());
  // })
  var id_check = false;
  var pw_check = false;

  $("#new_ppw, #new_pw").keyup(function (){
    if($("#new_pw").val() == $("#new_ppw").val()){
      if ($("#new_ppw").val() != "" && $("#new_pw").val() != "") {
        $("#notice").html("비밀번호가 일치합니다!");
        $("#notice").css("color", "green");

        pw_check  = true;
      }else{
        $("#notice").html("");
        pw_check  = false;
      }
    }else{
      $("#notice").html("비밀번호가 일치하지 않습니다!");
      $("#notice").css("color", "red");
      pw_check  = false;
    }
  })

  function to_submit(){
    if(pw_check == false){
      alert("비밀번호를 확인해주세요!");
      return false;

    }
  }

</script>
