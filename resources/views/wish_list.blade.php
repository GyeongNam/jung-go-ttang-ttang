@extends('layout.layout_main')

@section('css')
<link rel="stylesheet" href="/css/wish_list.css">
@endsection

@section('js')
<script type="text/javascript">
$(function(){
  $('#sel_delbt').click(function(){
    var result = confirm('관심품목에서 삭제하시겠습니까?');

    if(result) {
      //맞으면
      location.replace('wish_list.blade.php');
    }else {
      //
    }
  });
});

</script>

@endsection
@section('content')
<div class="wish_list_page">
  <div class="wish_content">
    <div class="wish_header">
      <div class="mylike">
        내관심
        <span class="mylikesu">2</span>
      </div>
      <hr></div>
      <div class="wish_tag">
        <div class="wish_btn">
          <div class="w_chack">
            <button type="button" name="button">V</button>
            <button class="sel_del" id="sel_delbt"type="button" name="button" onclick="delete_select">선택 삭제</button>
            <div class="hyper">
              <a href="#">최신순</a>
              <a href="#">높은가격순</a>
              <a href="#">낮은가격순</a>
            </div>
          </div>
        </div>

      </div>
      <div class="wish_block">
        <div class="wish_info">
          <div class="wish_item_info">
           <a href="#" class="prdt_link">
             <div class="wish_item_img">
             <img src="/img/item/릴카.png" alt="">
             <div class="check_self">
               <div class="check_qus nost divnost">
                 ::before
                 ::after
               </div>
             </div>
           </div>
           <div class="w_i_info">
             <div class="w_i_pro_i">
               <div class="wiproname">
                 아이폰 프로 맥스
               </div>
               <div class="wiproprice">
                 187,900원
               </div>
               <div class="wiprodate">
                 5일전
               </div>
             </div>
           </div>
         </a>
          </div>
        </div>
      </div>
    </div>
    <div class="tung"></div>
  </div>
  @endsection
