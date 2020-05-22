@extends('layout.layout_main')

@section('css')
<link rel="stylesheet" href="/css/product.css">
@endsection

@section('content')
<div class="">
  <div class="contents">
    <h2>경매물품 등록 <span>*필수항</span></h2>
    <ul>
      <li>
        <div class="pro_info">

        </div>
      </li>
      <li>
        <div class="">
          <label for="">제품이름</label>
            <input class="pro_tem" type="text" name="product_name" value="" placeholder="제품명은 필수입력입니다!">
        </div>
      </li>

      <li>
        <label>제조사<br>
          <input class="pro_tem" type="text" name="product_name" value="" placeholder="(선택항목)">
        </label>
      </li>
      <li>
        <label>구매일<br>
          <input class="pro_tem" type="date" name="product_buy" value="" placeholder="()">
        </label>
      </li>
      <li>
        <label>상품 카테고리<br>
          <select class="" name="">
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
        </label>
      </li>
      <li>
        <label>상품 개봉여부<br>
          <div>
            <input type="radio" name="boxing" value="" checked>개봉</input>
            <input type="radio" name="boxing" value="" >미개봉</input>
          </div>
        </label>
      </li>
      <li>
        <label>경매 마감일자<br>
          <input class="pro_tem" type="date" name="Auction_last_time" value="">
        </label>
      </li>
      <li>
        <label><h1>경매 시작가</h1>
          <input class="pro_tem" type="text" name="" value=""placeholder="경매 시작가 최소 가격은 500원 부터 입니다!">
        </label>
      </li>
      <div class="fileuplode">
        <ul>
          <li>
            <label>제품사진등록<br>
              <input type="file" name="" value="">
            </label>
          </li>
          <li>
            <label for="">
            </label>
          </li>
        </ul>
      </div>

    </ul>
  </div>
  <div class="s_left">

  </div>
  <div class="s_right">

  </div>
</div>


@endsection
