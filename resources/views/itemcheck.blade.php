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
    $(".it_if2").hide();

    $(".on").on("click",function(){
      $(".it_if1").hide();
      $(".it_if2").show();
    });
  });

  $(function(){


    $(".on1").on("click",function(){
      $(".it_if2").hide();
      $(".it_if1").show();
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

      <div class="it_subbutton1">

        <button id="su_but1" ><b>목록</b></button>
        <button id="su_but2" ><b>내입찰가격</b></button>
        <button id="su_but3" ><b>진행상태</b> </button>
        <button id="su_but4" ><b>낙찰여부</b></button>
      </div>

  <div class="it_if1">
    <div class="it_img">
      <a href="#" class="it_img1">
        <img src="/img/item/{{$myStat[0]->item_picture}}" alt="상품사진" name="#" class="ite_img">
        <div class="ite_na"> {{$myStat[0]->item_name}}</div>
      </a>
    </div>
      <div class="price1">
        {{$myStat[0]->item_startprice}} 원
      </div>
      <div class="state1">
        진행중
      </div>
      <div class="yesorno">
        O
      </div>
    </div>

    <div class="it_if2">
      <div class="it_img">
        <a href="#" class="it_img1">
          <img src="/img/item/{{$myStat[2]->item_picture}}" alt="상품사진" name="#" class="ite_img">
          <div class="ite_na"> {{$myStat[2]->item_name}}</div>
        </a>
      </div>
        <div class="price1">
          {{$myStat[2]->item_startprice}}원
        </div>
        <div class="state1">
          진행중
        </div>
        <div class="yesorno">
          O
        </div>
      </div>


  </div>

@endsection
