@extends('layout.layout_main')
<!--
@section('title')
  중고땅땅-내 정보
@endsection-->

@section('css')
  <link rel="stylesheet" href ="/css/user/mypage.css"/>
@endsection

@section('js')
@endsection

@section('content')
  <div class="mp_layout">
    <div class="mp_header">
      <div class="mp_img">
        <img src="/img/mp_img.png">
      </div>
    </div>
    <div class="mp_main">
      <div class="mp_row">
        <div>
          <div class="mp_head">
            아이디
          </div>
          <div class="mp_data">
            asd123
          </div>
        </div>

        <div>
          <div class="mp_head">
            이메일
          </div>
          <div class="mp_data">
            asd123@naver.com
          </div>
        </div>

        <div>
          <div class="mp_head">
            전화번호
          </div>
          <div class="mp_data">
            010-1111-1111
          </div>
        </div>

        <div>
          <div class="mp_head">
            생년월일
          </div>
          <div class="mp_data">
            1996-01-01
          </div>
        </div>

        <div>
          <div class="mp_head">
            성별
          </div>
          <div class="mp_data">
            남성
          </div>
        </div>

      </div>
    </div>
    <div class="mp_menu">
      <a href="/mypage/update"><b>회원 정보 수정</b></a>
    </div>
    <div class="mf_out">
      <a href="#"><strong>회원 탈퇴</strong></a>
    </div>
  </div>
@endsection
