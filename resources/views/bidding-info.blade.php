@extends('layout.layout_main')

@section('title')
  중고땅땅-입찰정보
@endsection

@section('css')
<link rel="stylesheet" href ="/css/bidding-info.css"/>
@endsection

@section('js')


@endsection

@section('content')

<div class="bd_layout">
  <div class="bd_form">
    <div class="bd_header">
      <div class="bd_head">
        <span class="bd_headname">입찰정보</span>
      </div>
    </div>

  <div class="bd_if">
    <div class="bd_main">
    <img class="bd_img" src="img/item/bora.png">
  </div>
  <div class="bd_main2">
    <div class="bd_name">
      <span class="bd_name1">보라돌이</span>
    </div>
    <div class="bd_price">
      <span class= "bd_price1">현재가격:300000</span>
    </div>
    <div class="bd_stprice">
      <span>시작가격:300000</span>
    </div>
    <div class="bd_bid">
      <span clsss="bid_pr">낙찰할금액:</span>
      <input type="text" name="" value="" class="bid_name">
    </div>
  </div>
</div>
  <div class="but_head">
    <div class="bd_button">
      <button type="button" class="bd_but1">취소하기</button>
    </div>
    <div class="bd_button">
      <button type="button"class="bd_but1">입찰하기</button>
    </div>
  </div>

</div>
</div>


</div>
@endsection
