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
  $(".on1").css("background-color","rgb(219, 252, 255)");
  $(".on").css("background-color","rgb(214, 214, 214)");

  $(".on").on("click",function(){
    $(".it_if1").hide();
    $(".it_if2").show();
    $(".on").css("background-color","rgb(219, 252, 255)");
    $(".on1").css("background-color","rgb(214, 214, 214)");
  });
  $(".on1").on("click",function(){
    $(".it_if2").hide();
    $(".it_if1").show();
    $(".on").css("background-color","rgb(214, 214, 214)");
    $(".on1").css("background-color","rgb(219, 252, 255)");
  });
  $(".bid_info_btn").click(function(){
    $("#bidmyModal").fadeIn();
    $("#del_per").click(function(){
   $("#bidmyModal").fadeOut();
    });
  });
  $(".bid_info_btn2").click(function(){
    $("#bidmyModa2").fadeIn();
    $("#del_per2").click(function(){
   $("#bidmyModa2").fadeOut();
});
});
});





</script>

@endsection

@section('content')
<div class="it_layout">
 <div class="it_header">
   <div class="it_main">
     <span class ="namesize">경매중인 품목확인하기</span>
     <span><a href="item/product" class="plus"><i class="fas fa-plus"></i>
     </a></span>
   </div>
 </div>
<hr class="it_main_line">
 <div class="it_button" id="it_but">
   <button id="but1" class="on1">
     <b>내가참여한경매</b></button>
 <button id="but2"class="on">
       <b>내가올린경매</b></button>
     </div>
     <div class="table1">
     <table width="100%"   align = "center" class="tab" >
       <th width="30%"><b>목록</b></th>
       <th width="30%"><b>입찰가격</b></th>
       <th width="20%"><b>진행상태</b> </th>
       <th width="20%"><b>낙찰여부</b></th>
     </table>

     {{-- 내가참여한경매 --}}
     <div class="">


     @foreach ($myAuction as $key => $value)
     <table class ="it_if1" width="100%" border="1"  align = "center" class="matab">
       <tbody width="100%">


         <tr width="100%">

           <td width="30%"><button type="button" name="button" class="but2">
             <a href="/product-detail/{{$value->item_number}}"><img src="/img/item/{{$value->item_picture}}" alt="상품사진" name="#" class="ite_img"></a>
           </button>
           <div class="ite_na" name="item_name" value="{{$value->item_name}}"> {{$value->item_name}}</div>
           </td>
         <td width="30%">
             {{ number_format($value->item_price)}}
         </td>
         @if ($value->item_success != 1 )

         <td width = "20%">
           <span>진행중</span>
         </td>
       @else
         <td width="20%">
             낙찰
             <div>
               <button type="button" id="bid_info_btn" class="bid_info_btn" name="button">낙찰정보 확인</button>
             </div>
         </td>

           @endif
         @if ($value->success != 1)
           <td class="yesorno">
             <span>O</span>
             <p><button class="hide_but">구매하기</button></p>
           </td>
        @else
         <td class="yesorno">
           X
         </td>
          @endif
       </tr>
     </tbody>
     </table>
           @endforeach
           </div>
     {{-- 내가올린경매 --}}

     <div class="">


     @foreach ($myStat as $key => $value)
     <table class ="it_if2" width="100%" border="1"  align = "center" class="matab">
       <tbody width="100%">
         <tr width="100%">
           <td width="30%"><button type="button" name="button" class="but2">
              <a href="/product-detail/{{$value->item_number}}"><img src="/img/item/{{$value->item_picture}}" alt="상품사진" name="#" class="ite_img"></a>
           </button>
           <div class="ite_na" name="item_name" value="{{$value->item_name}}"> {{$value->item_name}}</div>
           </td>
         <td width="30%">
             {{ number_format($value->item_price)}} 원
         </td>
         @if ($value->item_success != 1 )
         <td width = "20%">
           <span>진행중</span>
           <p><button class="hide_but">판매종료</button></p>
         </td>
       @else
         <td width="20%">
           판매종료
           <div>
           <button type="button" id="bid_info_btn2" class="bid_info_btn2" name="button">낙찰현황확인</button>
           </div>
         </td>

           @endif
         @if ($value->success != 1)
           <td class="yesorno">
             <span>O</span>
           </td>
        @else
         <td class="yesorno">
           X
         </td>
          @endif
       </tr>
     </tbody>
     </table>
           @endforeach
           </div>
</div>
 </div>

 <div id="bidmyModal" class="bidmodal">
   <div class="modal-bid">
     <div class="modal_bidheader">
       낙찰정보확인
     </div>
     <div class="bid_info">
       <div class="nakchalgood">
         낙찰이 정상적으로 완료되었습니다!
       </div>
       <div class="nak_info">

         <div class="nak_p_lab">
           낙찰금액 :
         </div>
         <div class="nak_p">
           @if(count($myAuction)>0)
           {{ number_format($myAuction[0]->item_price)}}원
           @endif
         </div>
       <!--</div>-->
         <div class="nak_naeyong">
           낙찰당첨!!
           <div class="nak_sunwe">
             1순위
           </div>

           <div class="nak_name">
             <div class="nak_seller">
               경매 판매자 :
             </div>
             <div class="nak_people">
               @if(count($myAuction)>0)
               {{$myAuction[0]->seller_id}}
               @endif
             </div>
           </div>
           <div class="nak_time">
             구매 가능시간 :
           </div>
           <div class="buy_time">
             36시간:12분:28초
           </div>
           <div class="nak_date">
             1일 이내에 거래 완료를 하지 않으면 다음 낙찰 대기자에게 상품이 넘어갑니다.
           </div>
         </div>
       </div>
     </div>
     <div class="">
       <button class="close" id="del_per" type="button" name="button">돌아가기</button>
       <button class="" id="del_per" type="button" name="button" >쪽지하기</button>
     </div>
   </div>
 </div>

 <div id="bidmyModa2" class="bidmoda2">
   <div class="modal-bid">
     <div class="modal_bidheader">
       낙찰정보현황
     </div>
     <div class="bid_info">
       <div class="nakchalgood">
         1순위부터 5순위까지 확인해 주세요!
       </div>
       <div class="nak_info">
         <div class="nak_p_lab">
           1위:{{number_format($spp[0]->success_price1)}}원
         </span>
         <div class="nak_p_lab">
           2위:{{number_format($spp[0]->success_price2)}}원
         </div>
         <div class="nak_p_lab">
           3위:
         </div>
         <sdiv class="nak_p_lab">
           4위:
         </div>
         <div class="nak_p_lab">
           5위:
         </div>
         <div class="nak_p">
           당첨자:minpro
         </div>
         <span class="nak_p_lab">
           낙찰가:
         </span>
         <span class="nak_p_lab">
            100000
         </span>
         <span class="nak_p_lab">
            원
         </span>
       </div>
     </div>

     <div class="">
       <button class="close2" id="del_per2" type="button" name="button" >돌아가기</button>
       <button class="" id="del_per" type="button" name="button" >쪽지하기</button>
     </div>
   </div>
 </div>
</div>
 {{-- <script type="text/javascript">
 var modal = document.getElementById("bidmyModal");
 var btn = document.getElementById("bid_info_btn");
 var bu = document.getElementsByClassName("close")[0]; //[0]이 붇는 이유  -> 클래스는 배열값으로 리턴받기 때문!

 // 버튼 클릭시 낙찰확인정보창 오픈
 btn.onclick = function() {
   modal.style.display = "block";
 }
// 버튼 클릭시 낙찰확인정보창 닫기
 bu.onclick = function() {
   modal.style.display = "none";
 }

 // 낙찰확인정보창이 떴을때 창 외에 화면을 클릭시 모달창 닫기
 window.onclick = function(event) {
   if (event.target == modal) {
     modal.style.display = "none";
   }
 }


 // Get the modal
 var modal2 = document.getElementById("bidmyModa2");

 // Get the button that opens the modal
 var btn2 = document.getElementById("bid_info_btn2");

 // Get the <span> element that closes the modal
 var span2 = document.getElementsByClassName("close2")[0];

 // When the user clicks the button, open the modal
 btn2.onclick = function() {
   modal2.style.display = "block";
 }

 // When the user clicks on <span> (x), close the modal
 span2.onclick = function() {
   modal2.style.display = "none";
 }

 // When the user clicks anywhere outside of the modal, close it
 window.onclick = function(event) {
   if (event.target == modal2) {
     modal2.style.display = "none";
   }
 }
 </script> --}}
@endsection
