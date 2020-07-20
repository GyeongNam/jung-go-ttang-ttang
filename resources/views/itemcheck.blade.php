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
//   $(".bid_info_btn").click(function(){
//     $("#bidmyModal").fadeIn();
//     $("#del_per").click(function(){
//    $("#bidmyModal").fadeOut();
//     });
//   });
//   $(".bid_info_btn2").click(function(){
//     $("#bidmyModa2").fadeIn();
//     $("#del_per2").click(function(){
//    $("#bidmyModa2").fadeOut();
// });
// });
});
    function modal_mya(data){
      $("#bidmyModal"+data).fadeIn();
    }

    function modal_out_mya(data){
      $("#bidmyModal"+data).fadeOut();
    }

    function modal_mys(data){
      $("#bidmyModa2"+data).fadeIn();
    }

    function modal_out_mys(data){
      $("#bidmyModa2"+data).fadeOut();
    }
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
     <table width="100%" align = "center" class="tab" >
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
           @if ($value->item_success == 1 )
           <td width = "20%">
             <span>진행중</span>
           </td>
           @else
             <td width = "20%">
               <span>경매종료</span>
             </td>
             <td width="20%">
                 <div>
                   <button type="button" id="bid_info_btn" class="bid_info_btn" onclick="modal_mya({{$value->item_number}})" name="button">낙찰정보 확인</button>
                 </div>
             </td>
          @endif

          @if($value->item_success == 1)
             <td class="yesorno">
               낙찰진행중
             </td>
           @else
           @if (!Empty($end[$key][0]->buyer))
             @if (decrypt(session('login_ID')) == $end[$key][0]->buyer)

             @elseif($end[$key][0]->buyer == null)
             <td class="yesorno">
               X
             </td>
          @endif
        @endif
      @endif
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
               {{ number_format($value->item_startprice)}} 원
           </td>
           @if ($value->item_success == 1 )
           <td width = "20%">
             <span>진행중</span>
           </td>
           @else
           <td width="20%">
             판매종료
             <div>
             <button type="button" id="bid_info_btn2" class="bid_info_btn2" onclick="modal_mys({{$value->item_number}})" name="button">낙찰현황확인</button>
             </div>
           </td>
           @endif
           @if ($value->success == 1)
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

 {{-- 내가 참여한 경매의 모달  --}}
 @foreach ($myAuction as $key => $value)
 <div id="bidmyModal{{$value->item_number}}" class="bidmodal">
   <div class="modal-bid">
     <div class="modal_bidheader">
       낙찰정보확인
     </div>
     <div class="bid_info">
       @if(!Empty($end[$key][0]->buyer))
       @if(decrypt(session('login_ID')) == $end[$key][0]->buyer)
       <div class="nakchalgood">
         낙찰했습니다.
       </div>

       <div class="nak_info">

         <div class="nak_p_lab">
           입찰금액 :
         </div>
         <div class="nak_p">
           @if(count($myAuction)>0)
           {{ number_format($value->item_price)}}원
           @endif
         </div>
       <!--</div>-->
         <div class="nak_naeyong">
           낙찰!!
           <div class="nak_name">
             <div class="nak_seller">
               경매 판매자 :
             </div>
             <div class="nak_people">
               @if(count($myAuction)>0)
               {{$value->seller_id}}
               @endif
             </div>
           </div>
           <div class="nak_time">
             구매 가능시간 :
           </div>
           <div class="buy_time">
             시간
           </div>
           <div class="nak_date">
             2일 이내에 거래 완료를 하지 않으면 다음 낙찰 대기자에게 상품이 넘어갑니다.
             빨리 판매자에게 쪽지하세요!
           </div>
         </div>
       </div>

    @else
      <div class="nakchalgood">
        낙찰에 실패했습니다.
      </div>
       @if(!Empty($end[$key][0]->success_user2))
       @if(decrypt(session('login_ID')) == $end[$key][0]->success_user2)
         <div class="nak_sunwe">
         순위 2위
         </div>
       @endif
       @endif

       @if(!Empty($end[$key][0]->success_user3))
       @if(decrypt(session('login_ID')) == $end[$key][0]->success_user3)
         <div class="nak_sunwe">
         순위 3위
         </div>
       @endif
       @endif

       @if(!Empty($end[$key][0]->success_user4))
       @if(decrypt(session('login_ID')) == $end[$key][0]->success_user4)
         <div class="nak_sunwe">
         순위 4위
         </div>
       @endif
       @endif

       @if(!Empty($end[$key][0]->success_user5))
       @if(decrypt(session('login_ID')) == $end[$key][0]->success_user5)
         <div class="nak_sunwe">
         순위 5위
         </div>
       @endif
       @endif

    @endif
    </div>

    <div class="">
      <button class="close" id="del_per" onclick="modal_out_mya({{$value->item_number}})" type="button" name="button">돌아가기</button>
      {{-- <a href="/remove_enditem/{{$value->item_number}}/{{session('login_ID')}}">  <button class="" id="del_per" onclick="modal_out_mya({{$value->item_number}})" type="button" name="button" >포기하기</button></a> --}}
    </div>
  @else
      <div class="nakchalgood">
        낙찰에 실패했습니다.
      </div>


     </div>

     <div class="">
       <button class="close" id="del_per" onclick="modal_out_mya({{$value->item_number}})" type="button" name="button">돌아가기</button>
       <a href="/remove_enditem/{{$value->item_number}}/{{session('login_ID')}}">  <button class="" id="del_per" onclick="modal_out_mya({{$value->item_number}})" type="button" name="button" >포기하기</button></a>
     </div>
       @endif
   </div>
 </div>
@endforeach


 {{-- 내가 올린 경매의 모달  --}}
 @foreach ($myStat as $key => $value)
 <div id="bidmyModa2{{$value->item_number}}" class="bidmoda2">
   <div class="modal-bid">
     <div class="modal_bidheader">
       낙찰정보현황
     </div>
       @if ($value->success == 1)
     <div class="bid_info">
       <div class="nakchalgood">
         1순위부터 5순위까지 확인해 주세요!
       </div>
       <div class="nak_info">
         <div class="nak_p_lab">
           @if(!Empty($users[$key][0]->success_price1))
           1위:{{$users[$key][0]->success_price1}} @if(!Empty($rank1[$key][0]))원 {{$rank1[$key][0]->buyer_ID}}
           @endif
         @endif
         <div class="nak_p_lab">
            @if(!Empty($users[$key][0]->success_price2))
           2위:{{$users[$key][0]->success_price2}} @if(!Empty($rank2[$key][0]))원 {{$rank2[$key][0]->buyer_ID}}
           @endif
         @endif
         </div>
         <div class="nak_p_lab">
            @if(!Empty($users[$key][0]->success_price3))
           3위:{{$users[$key][0]->success_price3}} @if(!Empty($rank3[$key][0]))원 {{$rank3[$key][0]->buyer_ID}}
           @endif
         @endif
         </div>
         <div class="nak_p_lab">
            @if(!Empty($users[$key][0]->success_price1))
           4위:{{$users[$key][0]->success_price4}} @if(!Empty($rank4[$key][0]))원 {{$rank4[$key][0]->buyer_ID}}
           @endif
         @endif
         </div>
         <div class="nak_p_lab">
            @if(!Empty($users[$key][0]->success_price1))
           5위:{{$users[$key][0]->success_price5}} @if(!Empty($rank5[$key][0]))원 {{$rank5[$key][0]->buyer_ID}}
           @endif
         @endif
         </div>
         <div class="nak_p">
           당첨자:@if(!Empty($rank1[$key][0])) {{$rank1[$key][0]->buyer_ID}} @endif
         </div>
         <span class="nak_p_lab">
           낙찰가:
         </span>
         <span class="nak_p_lab">
            @if(!Empty($users[$key][0]->success_price1))
            {{$users[$key][0]->success_price1}}
            @endif
         </span>
         <span class="nak_p_lab">
            원
         </span>
         <div>
         현재 낙찰자에게 쪽지하세요!
       </div>
       </div>
     </div>

     <div class="">
       <button class="close2" id="del_per2" onclick="modal_out_mys({{$value->item_number}})" type="button" name="button" >돌아가기</button>
       <button class="" id="del_per" type="button" name="button"onclick="location.href='/end/{{$value->item_number}}'" >거래완료하기</button>
     </div>
   @else
     안타깝게도 경매 참여자가 없어 유찰되었습니다.
     <div class="">
       <button class="close2" id="del_per2" onclick="modal_out_mys({{$value->item_number}})" type="button" name="button" >돌아가기</button>
     </div>
   @endif
   </div>
 </div>

</div>
 @endforeach
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
