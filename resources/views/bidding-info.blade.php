@extends('layout.layout_main')

@section('title')
  중고땅땅-입찰정보
@endsection

@section('css')
<link rel="stylesheet" href ="/css/bidding-info.css"/>
@endsection

@section('js')

<script>
// $(function(){
//
//   $("#sus_but").click(function() {
//       if ($(".bid_name").val() ==0) {
//       alert("낙찰가를 입력해주세요.");
//       return false;
//     };
//   });
// })
  $(function(){
   var bid_test = confirm("낙찰을 하시겠습니까?");
   var price = $(".bd_price1").val();
   var bidprice = $(".bid_name").val();
     $("#sus_but").click(function(){
       if( bidprice < price){
         alert("현재가격보다 낙찰가격이 낮아요")
         return false;

       }else if(bidprice.search(/\s/) != -1) {
         alert("낙찰가를 입력해주세요.");
         return false;
       }
       else{
         confirm("낙찰을 하시겠습니까?")

       };
       if (bid_test == true) {
            $("#popup").fadeIn();
            $(".exit").click(function(){
            $("#popup").fadeOut();
          });
     };
   });

   });

   // $(function(){
   //   $("#sus_but").click(function() {
   //     $("#popup").fadeIn();
   //   });
   //   $(".exit").click(function(){
   //     $("#popup").fadeOut();
   //   });
   //
   // });



</script>

@endsection

@section('content')
  <div id ="popup">
    <div id="popmenu">
      <h1>입찰완료</h1>
      <hr>
      <p class="po1"><h2>입찰이 정상적으로 완료되었습니다.</h2></p>
      <hr>
      <p><h2>입찰금액:300000원</h2></p>
      <hr>
      <p><b>이름:엄준식</b></p>
      <p><b>00:00:00</b></p>
      <div class="exit">
        <button type="button" name="button">닫기</button>
      </div>
    </div>
  </div>
<div class="bd_layout">
  <div class="bd_form">
    <div class="bd_header">

      <div class="bd_head">
        <span class="bd_headname">입찰정보</span>

      </div>
    </div>
<form class="" method="post">
  <div class="bd_if">
    <div class="bd_main">
    <img class="bd_img" src="img/item/bora.png">
  </div>
  <div class="bd_main2">
    <div class="bd_name">
      <span class="bd_name1">보라돌이</span>
    </div>
    <div class="bd_price">
      <span class= "bd_price1" value="300000">현재가격:300000</span>
    </div>
    <div class="bd_stprice">
      <span class="bd_stprice1">시작가격:300000</span>
    </div>
    <div class="bd_bid">
      <span clsss="bid_pr"><b>낙찰할금액:</b></span>
      <input type="number" name="" class="bid_name" required>
    </div>
  </div>
</div>
  <div class="but_head">
    <div class="bd_button">
      <button type="button" class="bd_but1">취소하기</button>
    </div>
    <div class="bd_button">
      <button type="button"class="bd_but1" id="sus_but">입찰하기</button>
    </div>
  </form>
  </div>
</div>
</div>



</div>
@endsection
