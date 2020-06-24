@extends('layout.layout_main')

@section('css')
<link rel="stylesheet" href="/css/wish_list.css">
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function(){
  //최상단 체크박스 클릭
  $("#checkall").click(function(){
    //클릭되었으면
    if($("#checkall").prop("checked")){
      //input태그의 name이 chk인 태그들을 찾아서 checked옵션을 true로 정의
      $("input[name=chk]").prop("checked",true);
      //클릭이 안되있으면
    }else{
      //input태그의 name이 chk인 태그들을 찾아서 checked옵션을 false로 정의
      $("input[name=chk]").prop("checked",false);
    }
  })
})
</script>
<script type="text/javascript">
$(function(){
  $('#sel_delbt').click(function(){

    var result = confirm('선택된 항목을 관심품목에서 삭제하시겠습니까?'); // 관심항목 삭제를 위한 선택창을 띄운다.

    if($(".chackSelect").prop("checked")) {
      //맞으면 아이템 삭제 (기능구현중)
      location.replace('/wish_lst');
    }else {
      //취소하면 페이지 그대로 유지
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
        <span class="mylikesu">{{$count}}</span>
      </div>
      <hr></div>
      <div class="wish_tag">
        <div class="wish_btn">
          <div class="w_chack">
            <label>전체선택<input type="checkbox" id="checkall" /></label>
            {{-- @if(session()->has('login_ID'))
                @if(decrypt(session()->get('login_ID')) == $value->favorite_id) --}}
                <div class="action_remove_item">
                    {{-- <a> --}}
                      <button class="sel_del" id="sel_delbt"type="button" name="button" onclick="delete_select">선택 삭제</button>
                    {{-- </a> --}}
                </div>
            {{-- @endif
          @endif --}}
            {{-- <div class="hyper">
              <a href="#">최신순</a>
              <a href="#">높은가격순</a>
              <a href="#">낮은가격순</a>
            </div> --}}
          </div>
        </div>

      </div>
      <div class="wish_block">
            <div class="wish_info">
              @foreach($wish_item as $key => $value)
              <div class="wish_item_info" value="{{$value->item_number}}">
                <a href="/product-detail/{{$value->item_number}}" >
                <div class="hreftem" style="cursor:pointer;" >
                  <img id="itmg" src="/img/item/{{$value->item_picture}}" alt="">
                  <div class="whghltn">
               <input type="checkbox" name="chk" class="chackSelect" value="">
                  </div>
                  <div class="w_i_info">
                    <div class="w_i_pro_i">
                      <div class="wiproname">
                        이름:{{$value->item_name}}
                      </div>
                      <div class="wiproprice">
                        가격:{{number_format($value->item_startprice)}}원
                      </div>
                      <a href="/wishitem_remove/{{$value->favorite_itemnum}}/{{$value->favorite_name}}">
                        <button class="del_jjim" type="button" name="button">삭제하기</button>
                      </a>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="tung"></div>
  </div>
  @endsection
