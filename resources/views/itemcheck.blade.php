@extends('layout.layout_main')

@section('title')
  중고땅땅-경매중인품목확인하기
@endsection

@section('css')
<link rel="stylesheet" href ="/css/itemcheck.css"/>
@endsection

@section('js')
  <script>
// 버튼 클릭시 발생되는 이벤트
 $(function(){
   $(".it_if2").hide();
   $(".on1").css("background-color","rgb(39, 188, 198)");
   $(".on").css("background-color","rgb(147, 139, 142)");

   $(".on").on("click",function(){
     $(".it_if1").hide();
     $(".it_if2").show();
     $(".on").css("background-color","rgb(39, 188, 198)");
     $(".on1").css("background-color","rgb(147, 139, 142)");
   });
 });

 $(function(){
   $(".on1").on("click",function(){
     $(".it_if2").hide();
     $(".it_if1").show();
     $(".on").css("background-color","rgb(147, 139, 142)");
     $(".on1").css("background-color","rgb(39, 188, 198)");
   });
 });


 </script>

@endsection

@section('content')
<div class="it_layout">
  <div class="it_header">
    <div class="it_main">
      <h1 class ="namesize">경매중인 품목확인하기</h1>
      <a href="item/product" class="plus"><i class="fas fa-plus"></i>
      </a>
    </div>
  </div>
 <hr class="it_main_line">
  <div class="it_button" id="it_but">
    <button id="but1" class="on1">
      <b>내가참여한경매</b></button>
  <button id="but2"class="on">
        <b>내가올린경매</b></button>
      </div>

      <div class="it_subbutton1">

        <button id="su_but1" ><b>목록</b></button>
        <button id="su_but2" ><b>내입찰가격</b></button>
        <button id="su_but3" ><b>진행상태</b> </button>
        <button id="su_but4" ><b>낙찰여부</b></button>
      </div>
{{-- 내가참여한경매 --}}
@foreach ($myStat as $key => $value)
  <div class="it_if1">
    <div class="it_img">
      <a href="product-detail" class="it_img1">
        <img src="/img/item/{{$value->item_picture}}" alt="상품사진" name="#" class="ite_img">
        <div class="ite_na"> {{$value->item_name}}</div>
      </a>
    </div>
      <div class="price1">
        {{$value->item_startprice}}원
      </div>
      @if ($value->item_success == -1 )

      <div class="state1">
        <span>진행중</span>

      </div>
    @else
      <div class="state1">
        낙찰
        <button type="button" id="bid_info_btn" name="button">낙찰정보 확인</button>
      </div>
        @endif
        @if ($value->success != 1)
          <div class="yesorno">
            <span>O</span>
            <p><button class="hide_but">구매하기</button></p>
          </div>
      @else
        <div class="yesorno">
          X
        </div>
        @endif
    </div>
@endforeach
{{-- 내가등록한경매 --}}
@foreach ($myStat as $key => $value)
  <div class="it_if2">
  <div class="it_img">
    <a href="#" class="it_img1">
      <img src="/img/item/{{$value->item_picture}}" alt="상품사진" name="#" class="ite_img">
      <div class="ite_na"> {{$value->item_name}}</div>
    </a>
  </div>
    <div class="price1">
      {{$value->item_startprice}} 원
    </div>
    @if ($value->item_success != 1 )

    <div class="state1">
      <span>진행중</span>
      <p><button class="hide_but">판매종료</button></p>
    </div>
  @else
    <div class="state1">
        낙찰
        <div class="delete_btn">

        </div>
    </div>
      @endif
    @if ($value->success != 1)
      <div class="yesorno">
        <span>O</span>

      </div>
  @else
    <div class="yesorno">
      X
    </div>
    @endif
  </div>
      @endforeach
  </div>
  <!-- The Modal -->
  <div id="bidmyModal" class="bidmodal">

    <!-- Modal content -->
    <div class="modal-bid">
      <div class="modal_bidheader">
        낙찰정보확인
      </div>
      <div class="bid_info">
        <div class="nakchalgood">
          낙찰이 정상적으로 완료되었습니다!
        </div>
        <div class="nak_info">
          <div id="" class="nak_price">
            <div class="nak_p_lab">
              낙찰금액 :
            </div>
            <div class="nak_p">
              130,000
            </div>
          </div>
          <div class="nak_naeyong">
            낙찰당첨!!
            <div class="nak_sunwe">
              1순위
            </div>
            <div class="nak_people">
              낙찰 당첨자 : 민프로**
            </div>
            <div class="nak_time">
              구매 가능시간 :
            </div>
            <div class="nak_date">
              1일 이내에 거래 완료를 하지 않으면 다음 낙찰 대기자에게 상품이 넘어갑니다.
            </div>
          </div>
        </div>
        <div class="">

        </div>
      </div>
      <div class="">
        <button class="close" id="del_per" type="button" name="button" >돌아가기</button>
        <button class="" id="del_per" type="button" name="button" >쪽지하기</button>
      </div>

    </div>

  </div>
  <script type="text/javascript">
  // Get the modal
  var modal = document.getElementById("bidmyModal");

  // Get the button that opens the modal
  var btn = document.getElementById("bid_info_btn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>
@endsection
