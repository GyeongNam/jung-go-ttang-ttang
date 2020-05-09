@extends('layout.layout_main')

@section('title')
  중고땅땅-내 정보
@endsection

@section('css')
  <style media="screen">
    .mp_layout{
      border: 10px solid #263343;
      border-radius: 12px;
      margin-left: auto;
      margin-right: auto;
      width: 524px;
      margin: 30px auto;
      color: #263343;
    }

    .mp_header{
      padding: 10px;
      padding-bottom: 20px;
    }

    .mp_header .mp_img{
      text-align: center;
    }

    .mp_menu{
      text-align: right;
      padding-bottom: 10px;
    }

    .mp_menu a{
      color: #263343;
    }

    .mp_row{
      padding: 10px;
    }

    .mp_head{
      background-color: rgba(172, 71, 159, 0.87);
      padding: 7px;
      color: white;
    }

    .mp_data{
      padding: 7px;
    }

  </style>
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
  </div>
@endsection
