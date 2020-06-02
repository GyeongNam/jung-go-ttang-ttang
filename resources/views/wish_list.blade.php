@extends('layout.layout_main')

@section('css')
<link rel="stylesheet" href="/css/wish_list.css">
@endsection

@section('js')
@endsection
@section('content')
<div class="wish_list_page">
  <div class="wish_content">
    <div class="wish_header">
      <div class="mylike">
        내관심
        <span class="mylikesu">2</span>
      </div>
    </div>
    <div class="wish_block">
      <div class="wish_tag">
        <div class="w_h_bt">
          <div class="w_chack">
            <button type="button" name="button">V</button>
          </div>
          <div class="w_select_del">
            <button type="button" name="button">선택 삭제</button>
          </div>
        </div>
      </div>
      <div class="wish_info">
        <div class="wish_item_info">
          <div class="wish_item_img">
            <img src="/img/itme/릴카.png" alt="">
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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
