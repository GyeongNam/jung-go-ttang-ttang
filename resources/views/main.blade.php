@extends('layout.layout_main')

@section('title')
대한민국 No.1 중고땅땅!
@endsection

@section('css')
<link rel="stylesheet" href="/css/main.css">
<!--<link rel="stylesheet" href="/css/swiper.css">-->
@endsection
@section('js')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
@endsection

@section('content')
<div class="speace">
  <div class="article">
    <div class="right_side_form">
      <!-- 퀵 메뉴, top button -->
      <div class="right_menu">
        <div class="quickBox"><p>최근 본 상품</p>
          <div class="re_view">
            <div class="view_box">
              <div class="view_list">
                <a class="view_item" href="#">
                  <img src="/img/product.png" alt="상품 이미지">
                </a>
                <a class="view_item" href="#">
                  <img src="/img/product.png" alt="상품 이미지">
                </a>
                <a class="view_item" href="#">
                  <img src="/img/product.png" alt="상품 이미지">
                </a>
              </div>
            </div>
          </div>
          <div class="btn_top">
            <p class="btn_top"><a href="#none">top</a></p>
          </div>
        </div>
        <script type="text/javascript">
        /* -----top 버튼, 스크롤 퀵 메뉴----- */
        var quickBox = $('.quickBox'); //퀵메뉴 코딩한 div의 클래스 네임
        var quick_top = 300; // 퀵메뉴 배너 이미지의 기준이 되는 높이 값입니다.
        quickBox.css('top', $(window).height() );
        $(document).ready(function(){
          quickBox.animate( { "top": $(document).scrollTop() + quick_top +"px" },  500 ); //숫자값을 변경하면 속도변화
          $(window).scroll(function(){
            quickBox.stop();
            quickBox.animate( { "top": $(document).scrollTop() + quick_top + "px" }, 500 ); //숫자값을 변경하면 속도변화
          });
        });
        /* -----top 버튼----- */
        $(function() {
          $(".btn_top").click(function() {
            $('html, body').animate({
              scrollTop : 0
            }, 400);
            return false;
          });
        });
        </script>
    </div>
    <div class="main_form">
      <h1><strong>현재 경매 건수는?&nbsp;&nbsp;&nbsp;<b class="product_count"></b>건 입니다.</strong></h1>

      <!-- 메인 슬라이드 광고배너 -->
      <div class="swiper">
        <div class="slideshow-container">

          <!-- Full-width images with number and caption text -->
          <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img href="#" src="/img/pg1.jpg">
          </div>

          <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img href="#" src="/img/pg2.jpg">
          </div>

          <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img href="#" src="/img/pg3.png">
          </div>

        </div>
      </div>

      <!--제품 정보 표시-->
      <div class="product">
        <div class="categorybar">
          <a href="#man">남성의류</a>
          <a href="#woman">여성의류</a>
          <a href="#fashion">패션잡화</a>
          <a href="#beauty">뷰티미용</a>
          <a href="#mobile">모바일</a>
          <a href="#Elec_products">가전제품</a>
          <a href="#laptop">노트북/PC</a>

        </div>
        <div class="best_item">
          <div class="item_list">
            <h2>인기상품</h2>
            <div class="item">
              <img src="/img/product.png" alt=""><br>
              <a href="#">IPad Pro 64G 3세대</a><br>
              <a href="#">상품가격 : </a>
              <input id="favorit" type="button" name="favorites" value="즐겨찾기" onclick='sucess()'>
            </div>
            <div class="item">
              <img src="/img/product.png" alt=""><br>
              <a href="#">IPad Pro 64G 3세대</a><br>
              <a href="#">상품가격 : </a>
              <input id="favorit" type="button" name="favorites" value="즐겨찾기" onclick="alert('즐겨찾기에 추가되었습니다!')">-->
            </div>
            <div class="item">
              <img src="/img/product.png" alt=""><br>
              <a href="#">IPad Pro 64G 3세대</a><br>
              <a href="#">상품가격 : </a>
              <input id="favorit" type="button" name="favorites" value="즐겨찾기" onclick="alert('즐겨찾기에 추가되었습니다!')">-->
            </div>
            <div class="item">
              <img src="/img/product.png" alt=""><br>
              <a href="#">IPad Pro 64G 3세대</a><br>
              <a href="#">상품가격 : </a>
              <input id="favorit" type="button" name="favorites" value="즐겨찾기" onclick="alert('즐겨찾기에 추가되었습니다!')">-->
            </div>
            <div class="item">
              <img src="/img/product.png" alt=""><br>
              <a href="#">IPad Pro 64G 3세대</a><br>
              <a href="#">상품가격 : </a>
              <input id="favorit" type="button" name="favorites" value="즐겨찾기" onclick="alert('즐겨찾기에 추가되었습니다!')">-->
            </div>
            <div class="item">
              <img src="/img/product.png" alt=""><br>
              <a href="#">IPad Pro 64G 3세대</a><br>
              <a href="#">상품가격 : </a>
              <input id="favorit" type="button" name="favorites" value="즐겨찾기" onclick="alert('즐겨찾기에 추가되었습니다!')">-->
            </div>
          </div>
          <div class="item_list">
            <div class="list_hd">
              <h2 id="man">남성의류 <a href="#">전체보기</a></h2>
            </div>

            <div class="item">
              <img src="/img/product.png" alt=""><br>
              <a href="#">IPad Pro 64G 3세대</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/iphone.png" alt=""><br>
              <a href="#">iPhone 11 Pro 64G</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/iphone12.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/iphoneSE2.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/ipadair.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/e300.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/rbgini.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/house.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/switch.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/catfol.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
          </div>
          <div class="item_list">
            <div class="list_hd">
              <h2 id="woman">여성의류 <a href="#">전체보기</a></h2>
            </div>

            <div class="item">
              <img src="/img/product.png" alt=""><br>
              <a href="#">IPad Pro 64G 3세대</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/iphone.png" alt=""><br>
              <a href="#">iPhone 11 Pro 64G</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/iphone12.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/iphoneSE2.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/ipadair.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/e300.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/rbgini.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/house.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/switch.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/catfol.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
          </div>
          <div class="item_list">
            <div class="list_hd">
              <h2 id="fashion">패션잡화 <a href="#">전체보기</a></h2>
            </div>

            <div class="item">
              <img src="/img/product.png" alt=""><br>
              <a href="#">IPad Pro 64G 3세대</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/iphone.png" alt=""><br>
              <a href="#">iPhone 11 Pro 64G</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/iphone12.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/iphoneSE2.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/ipadair.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/e300.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/rbgini.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/house.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/switch.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
            <div class="item">
              <img src="/img/catfol.png" alt=""><br>
              <a href="#">상품명을 입력하세요</a>
              <p>상품가격 : </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  function sucess() {
    if(!session('login_ID')) {
      return  alert('즐겨찾기에 추가되었습니다!');
    }
    else{
      return alert('로그인을 해 주세요!');
    }
  }


  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
  }
  </script>
  </div>
</div>

@endsection
