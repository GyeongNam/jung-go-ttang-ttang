@extends('layout.layout_main')

@section('title')
대한민국 No.1 중고땅땅!
@endsection

@section('css')
<link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
<div class="article">
  <div class="main_form">
    <h1>현재 경매 건수는?</h1>

    <div class="product">
      <div class="categorybar">
        <a href="#남성의류">남성의류</a>
        <a href="#여성의류">여성의류</a>
        <a href="#contact">패션잡화</a>
        <a href="#">뷰티미용</a>
        <a href="#">모바일</a>
        <a href="#">가전제품</a>
        <a href="#">노트북/데스크탑</a>

      </div>
      <div class="best_item">
        <div class="item_list">
          <h1>인기상품</h1>
          <div class="item">
            <img src="/img/product.png" alt=""><br>
            <a href="#">IPad Pro 64G 3세대</a>
            <p>상품정보</p>
          </div>
          <div class="item">
            <img src="/img/iphone.png" alt=""><br>
            <a href="#">iPhone 11 Pro 64G</a>
            <p>상품정보</p>
          </div>
          <div class="item">
            <img src="/img/iphone12.png" alt=""><br>
            <a href="#">상품명을 입력하세요</a>
            <p>상품정보</p>
          </div>
          <div class="item">
            <img src="/img/iphoneSE2.png" alt=""><br>
            <a href="#">상품명을 입력하세요</a>
            <p>상품정보</p>
          </div>
          <div class="item">
            <img src="/img/ipadair.png" alt=""><br>
            <a href="#">상품명을 입력하세요</a>
            <p>상품정보</p>
          </div>
          <div class="item">
            <img src="/img/e300.png" alt=""><br>
            <a href="#">상품명을 입력하세요</a>
            <p>상품정보</p>
          </div>
          <div class="item">
            <img src="/img/rbgini.png" alt=""><br>
            <a href="#">상품명을 입력하세요</a>
            <p>상품정보</p>
          </div>
          <div class="item">
            <img src="/img/house.png" alt=""><br>
            <a href="#">상품명을 입력하세요</a>
            <p>상품정보</p>
          </div>
          <div class="item">
            <img src="/img/switch.png" alt=""><br>
            <a href="#">상품명을 입력하세요</a>
            <p>상품정보</p>
          </div>
          <div class="item">
            <img src="/img/catfol.png" alt=""><br>
            <a href="#">상품명을 입력하세요</a>
            <p>상품정보</p>
          </div>
        </div>

        <div class="item_list">
        <h1>남성의류 <a href="#">전체보기</a></h1>
        <div class="item">
          <img src="/img/product.png" alt=""><br>
          <a href="#">IPad Pro 64G 3세대</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/iphone.png" alt=""><br>
          <a href="#">iPhone 11 Pro 64G</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/iphone12.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/iphoneSE2.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/ipadair.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/e300.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/rbgini.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/house.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/switch.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/catfol.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
      </div>
      <div class="item_list">
        <div class="list_name">
          <h1>여성의류</h1> <a href="#">전체보기</a>
        </div>
        <div class="item">
          <img src="/img/product.png" alt=""><br>
          <a href="#">IPad Pro 64G 3세대</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/iphone.png" alt=""><br>
          <a href="#">iPhone 11 Pro 64G</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/iphone12.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/iphoneSE2.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/ipadair.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/e300.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/rbgini.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/house.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/switch.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
        <div class="item">
          <img src="/img/catfol.png" alt=""><br>
          <a href="#">상품명을 입력하세요</a>
          <p>상품정보</p>
        </div>
      </div>
    </div>
    <div class="pagination">
      <div class="page">
        <a href="#">«</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">»</a>
      </div>
    </div>
  </div>
</div>
@endsection
