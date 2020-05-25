@extends('layout.layout_main')

@section('title')
  중고땅땅-경매중인품목확인하기
@endsection

@section('css')
<link rel="stylesheet" href ="/css/itemcheck.css"/>
@endsection

@section('js')
  <script>

  $(function(){
    $(".it_manu2").hide();

    $(".on").on("click",function(){
      $(".it_manu1").hide();
      $(".it_manu2").show();
    });
  });

  $(function(){


    $(".on1").on("click",function(){
      $(".it_manu2").hide();
      $(".it_manu1").show();
    });
  });

  </script>

@endsection

@section('content')
  <div class="it_layout">
    <div class="it_header">
      <div class="it_main">
        <h1>경매중인 품목확인하기</h1>
        <hr class="it_main_line">
      </div>
    </div>

      <div class="it_button" id="it_but">
        <button id="but1" class="on1"><a href="#" class="on1">
          <b>내가참여한경매</b></a></button>
        <button id="but2"class="on"><a href="#" class="on">
          <b>내가올린경매</b> </a></button>
    </div>

    <div class="it_subbutton">

      <button id="su_but1" ><b>목록</b></button>
      <button id="su_but2" ><b>내입찰가격</b></button>
      <button id="su_but3" ><b>진행상태</b> </button>
      <button id="su_but4" ><b>낙찰여부</b></button>
    </div>

    <div class="it_manu1">
      <div class="it_img" name="#">
        <a href="#" class="it_link" name="#">
        <img src="/img/iphone.png" alt="상품사진" name="#">
        <p class="it_name" name="#">아이폰pro</p>
        </a>
        <span class="price" name="#">30000000원</span>
        <span class="price2" name="#">진행중</span>
        <span class="price3" name="#">X</span>
      </div>

    </div>


      <div class="it_manu2">
        <div class="it_img" name="#">
          <a href="#" class="it_link" name="#">
          <img src="/img/iphone12.png" alt="상품사진" name="#">
          <p class="it_name" name="#">아이폰12</p>
          </a>
          <span class="price" name="#">3000원</span>
          <span class="price2" name="#">진행중</span>
          <span class="price3" name="#">X</span>
        </div>

        </div>






</div>


@endsection
