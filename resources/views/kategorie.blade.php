@extends('layout.layout_main')
<!--
@section('title')
  중고땅땅-카테고리
@endsection-->

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href ="/css/kategorie.css"/>
@endsection

@section('js')
@endsection

@section('content')
  <div class="kg_layout">
    <div class="kg_header">
      <div class="kg_menu">
        <h1 class= cg_name><b>전체 카테고리</b></h1>
        <hr class="kg_menu_line">
      </div>
    </div>

    <div class="kg_main">
      <a class="ca_icon" href="#">
      <img src="/img/cg_img/men-cloth.png" alt="남성의류" class="category_Img">
      <p class="ca_icon_name">남성의류</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/women-cloth.png" alt="여성의류" class="category_Img">
      <p class="ca_icon_name">여성의류</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/Fashion_goods.png" alt="패션잡화" class="category_Img">
      <p class="ca_icon_name">패션잡화</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/make-up.png" alt="뷰티미용" class="category_Img">
      <p class="ca_icon_name">뷰티미용</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/boy.png" alt="유아용/출산" class="category_Img">
      <p class="ca_icon_name">유아용/출산</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/mobile.png" alt="모바일" class="category_Img">
      <p class="ca_icon_name">모바일/태블릿</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/tv.png" alt="가전제품" class="category_Img">
      <p class="ca_icon_name">가전제품</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/notebook.png" alt="노트북/데스크탑" class="category_Img">
      <p class="ca_icon_name">노트북/데스크탑</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/camara.png" alt="카메라/캠코더" class="category_Img">
      <p class="ca_icon_name">카메라/캠코더</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/bed.png" alt="가구/인테리어" class="category_Img">
      <p class="ca_icon_name">가구/인테리어</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/household.png" alt="리빙/생활" class="category_Img">
      <p class="ca_icon_name">리빙/생활</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/book.png" alt="도서/음반/문구" class="category_Img">
      <p class="ca_icon_name">도서/음반/문구</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/ticket.png" alt="티켓/쿠폰" class="category_Img">
      <p class="ca_icon_name">티켓/쿠폰</p>
      </a>

      <a class="ca_icon" href="#">
      <img src="/img/cg_img/sport.png" alt="스포츠" class="category_Img">
      <p class="ca_icon_name">스포츠</p>
      </a>

  </div>
</div>
@endsection
