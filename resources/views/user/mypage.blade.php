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
      <div class="mp_menu">
        <a href="/mypage/update"><b>회원 정보 수정</b></a>
      </div>
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
            {{$data[0]->ID}}
        </div>
        </div>

        <div>
          <div class="mp_head">
            이메일
          </div>
          <div class="mp_data">
          {{$data[0]->EMAIL}}@ {{$data[0]->EMAIL_DOMAIN}}
          </div>
        </div>

        <div>
          <div class="mp_head">
            전화번호
          </div>
          <div class="mp_data">
          {{$data[0]->PHONE}}
          </div>
        </div>

        <div>
          <div class="mp_head">
            생년월일
          </div>
          <div class="mp_data">
             {{$data[0]->BIRTHDAY}}
          </div>
        </div>

        <div>
          <div class="mp_head">
            성별
          </div>
          <div class="mp_data">
              {{$data[0]->GENDER}}
          </div>
        </div>

      </div>
    </div>
  </form>
  </div>
@endsection
