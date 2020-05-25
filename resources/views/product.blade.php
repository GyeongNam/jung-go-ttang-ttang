@extends('layout.layout_main')

@section('css')
<link rel="stylesheet" href="/css/product.css">
@endsection
@section('js')
<script>
function chackprice(){
  var price = $("#price").val();
  var num = price.search(/[0-9]/g);
  var s_reprice1 = $('#s_reprice1');
  if (num < 0){
    s_reprice1.text("값을 입력하세요");
    $("#su_btn").attr("disabled", true);
  }
  else if (price < 500 ) {
    s_reprice1.text("500원 이상 입력해주세요");
    $("#su_btn").attr("disabled", true);
  }
  else {
    s_reprice1.text("");
    $("#su_btn").attr("disabled", false);

  }
}

</script>
@endsection
@section('content')
<div class="">
  <form class="" action="{{url('/product')}}" method="post">
    @csrf

  <div class="contents">
    <div class="product_header">
      <h1>경매물품 등록 <span ><strong>*필수항목</strong></span></h1>
    </div>

    <ul>
      <li>
        <div class="p_list">
          <div class="n_lab">
            <span><strong>*</strong></span>상품이름
          </div>
          <div class="p_info">
            <input class="p_name input" type="text" name="product_name" value="" placeholder="상품명은 필수입력입니다!" required>
          </div>

        </div>
      </li>

      <li>
        <div class="p_list">
          <div class="n_lab">
            제조사
          </div>
          <div class="p_info">
            <input class="p_maker input" type="text" name="product_maker" value="" placeholder="(선택 입력)">
          </div>
        </div>
      </li>
      <li>
        <div class="p_list">
          <div class="n_lab">
            구매일
          </div>
          <div class="p_info">
            <input class="p_buyday" type="date" name="product_buy" value="" placeholder="()">
          </div>
        </div>
      </li>
      <li>
        <div class="p_list">
          <div class="n_lab">
            <span><strong>*</strong></span>상품 카테고리
          </div>
          <div class="p_info">
            <select class="p_category" name="product_category" required>
              <option value="">카테고리 선택</option>
              <option value="">남성의류</option>
              <option value="">여성의류</option>
              <option value="">패션잡화</option>
              <option value="">뷰티미용</option>
              <option value="">유아용/출산</option>
              <option value="">모바일/태블릿</option>
              <option value="">가전제품</option>
              <option value="">노트북/데스크탑</option>
              <option value="">카메라/캠코더</option>
              <option value="">가구/인테리어</option>
              <option value="">리빙/생활</option>
              <option value="">도서/음반/문구</option>
              <option value="">티켓/쿠폰</option>
              <option value="">스포츠</option>
            </select>
          </div>
        </div>
      </li>
      <li>
        <div class="p_list">
          <div class="n_lab">
            상품 개봉여부
          </div>
          <div class="p_info" name="open">
            <input type="radio" name="boxing" value="" checked>개봉</input>
            <input type="radio" name="boxing" value="" >미개봉</input>
          </div>
        </div>
      </li>
      <li>
        <div class="p_list">
          <div class="n_lab">
            <span><strong>*</strong></span>경매 마감일자
          </div>
          <div class="p_info">
            <input class="p_last_day" type="datetime-local" name="Auction_last_time" value="" min="2000-01-01T00:00" max="2100-12-31T00:00" required>
          </div>
        </div>
      </li>
      <li>
        <div class="p_list">
          <div class="n_lab">
            <span><strong>*</strong></span>경매 시작가
          </div>
          <div class="p_info">
            <input class="p_startprice input" type="text" name="Auction_start" id="price" onKeyup="chackprice()"value=""placeholder="경매 시작가 최소 가격은 500원 부터 입니다!" required>
            <p><spen id="s_reprice1"></spen></p>
          </div>
        </div>
      </li>
      <div class="fileuplode">
        <ul>
          <li>
            <div class="p_list">
              <div class="p_lab">
                <div class="n_lab">
                  상품사진등록
                </div>
              </div>
              <div class="p_info">
                <div class="fr_pic">
                  <div class="p_picture input">
                    <input type="file" name="item_pic" value="" required>
                  </div>
                </div>
                <div class="lefrig_pic">
                  <div class="p_picture input">
                    <input type="file" name="" value="">
                  </div>
                </div>
                <div class="tobutt_pic">
                  <div class="p_picture input">
                    <input type="file" name="" value="">
                  </div>
                </div>

              </div>

            </div>
          </li>
          <li>
            <label for="">
            </label>
          </li>
        </ul>

        <div class="complete_btn">
          <button type="submit" id="su_btn" name="button" onclick="return to submit();">등록하기</button>
        </div>
      </div>

    </ul>
  </div>
  <div class="s_left">

  </div>
  <div class="s_right">

  </div>
  </form>
</div>


@endsection
