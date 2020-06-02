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
function checking(){
  var form = document.bd_form;
  if (!form.bdinput.value) {
    alert("낙찰금액을 입력하세요.")
    return false;

  }
}

  $(function(){                   //html 목록이 준비되면? 함수시작
           // 낙찰가격 변수지정
     $("#sus_but").click(function(){
       var price=$(".bd_price1").attr("value");   // 현재가격에 value 추가하고 변수로지정
       var bidprice=$(".bid_name").val();      //버튼 클릭시 함수 실행
       // console.log(price)
       // console.log(bidprice)
       var num = Number(price);
       // console.log(num);
       // var ndm = Number(bidprice);
       // console.log(ndm);

       if( bidprice < num){             // 현재금액 보다 낙찰가격이 작으면 경고창켜짐
         alert("현재가격보다 낙찰가격이 낮아요");
         return false;

       }
       else {                             // 위에 if문이 거짓이라면 확인창 켜짐
        var bid_test = confirm("낙찰을 하시겠습니까?");
         if (bid_test == true) {          //확인창 확인을 누르면 팝업창켜짐
              $("#popup").fadeIn();
              $(".exit").click(function(){    // 종료누르면 팝업창 꺼짐
                $("#popup").fadeOut();
              });
         }

       };
     });
   });
   //
   // $(function(){
   //   $("#sus_but").click(function() {
   //     $("#popup").fadeIn();
   //   });
   //   $(".exit").click(function(){
   //     $("#popup").fadeOut();
   //   });
   //
   // });
//



</script>

@endsection

@section('content')
  <div id ="popup">
    <div id="popmenu">
      <h1>입찰완료</h1>
      <hr>
      <p class="po1"><h2>입찰이 정상적으로 완료되었습니다.</h2></p>
      <hr>
      <p><h2>
        <span>입찰금액:</span>
        <span>300000</span>
        <span>원</span>
      </h2></p>
      <hr>
      <p><b>
        <span>이름:</span>
        <span>엄준식</span>
      </b></p>
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
<form class="" name="bd_form" method="post" onsubmit="return checking();">
  <div class="bd_if">
    <div class="bd_main">
    <img class="bd_img" src="img/item/bora.png">
  </div>
  <div class="bd_main2">
    <div class="bd_name">
      <span class="bd_name1">보라돌이</span>
    </div>
    <div class="bd_price">
      <span>현재가격:</span>
      <span class="bd_price1" value="300000">300000</span>
      <span>원</span>
    </div>
    <div class="bd_stprice">
      <span>시작가격:</span>
      <span class="bd_stprice1" name="money1" >300000</span>
      <span>원</span>
    </div>
    <div class="bd_bid">
      <span clsss="bid_pr"><b>낙찰할금액:</b></span>
      <input type="number" class="bid_name"  name="bdinput">
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
