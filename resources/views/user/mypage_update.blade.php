@extends('layout.layout_main')

@section('title')
중고땅땅-내 정보
@endsection

@section('css')
<link rel="stylesheet" href="/css/mypage_update.css">
@endsection

@section('js')
<script type="text/javascript">
$(function(){
  $("#img_click").click(function(){
    $("input[type=file]").click();
  })
})
</script>
@endsection

@section('content')
<div class="mysidnav">
  <div class="mp_layout">
    <form class="mypage_re" action="index.html" method="post" enctype="multipart/form-data">
      <div class="mp_header">
        <div class="mp_img">
          <label for="">프로필사진 변경</label><br>
          <img id="img_click" src="/img/mp_img.png">
          <input class="hide" type="file" name="" value="" accept=".png, .jpg, .jpeg, .gif">
        </div>
      </div>

      <div class="mp_main">
        <div class="mp_row">
          <div>
            <div class="mp_head">
              <label>이메일</label><br>
            </div>
            <div class="mp_e">
              <input type="text" class="mp_data_e" name="str_email01" id="str_email01" > @
              <input type="text" class="mp_data_e" name="str_email02" id="str_email02" placeholder="직접입력" disabled value="">
              <select name="selectEmail" class="mp_data_e" id="selectEmail">
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
            </div>
          </div>
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
          <div>
            <div class="mp_head">
              전화번호
            </div>
            <div class="mp_data">
              <input type="text" name="" value="010-1111-1111">
            </div>
          </div>

          <div>
            <div class="mp_head">
              생년월일
            </div>
            <div class="mp_data">
              <input type="date" name="" value="1996-01-01">
            </div>
          </div>

          <div>
            <div class="mp_head">
              성별
            </div>
            <div class="mp_data">
              <select class="" name="">
                <option value="">남성</option>
                <option value="">여성</option>
              </select>
            </div>
          </div>

        </div>
        <div class="mp_menu">
          <a id="mp_submit" href="#"><b>수정 완료</b></a>
        </div>
      </div>
    </form>
  </div>
  @endsection
