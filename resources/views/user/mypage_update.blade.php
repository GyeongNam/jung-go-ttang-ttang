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
              이메일
            </div>
            <div class="mp_data">
              <input type="text" name="" value="">
            </div>
          </div>
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
