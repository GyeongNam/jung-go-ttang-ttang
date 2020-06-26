<!DOCTYPE html>
<html lang="ko">
  <head>
    {{-- Title --}}
    <title>@yield('title')</title>

    {{-- Meta --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- css --}}
    <link rel="stylesheet" href ="/css/layout/footer.css" />
    <link rel="stylesheet" href ="/css/layout/header.css" />
    <link rel="stylesheet" href ="/css/layout/side.css" />

    {{-- Input custom css --}}
    @yield('css')

    {{-- js --}}

    <!-- J QUERY -->
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>

    <!-- Bootstarp START -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> --}}
    <!-- Bootstarp END -->

    <script src="https://kit.fontawesome.com/7cfb0a1075.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Do+Hyeon&display=swap" rel="stylesheet">
    <script scr="{{asset('sidemenu.js')}}"></script>

    {{-- custom js --}}
    <script>
      function openNav() {
        document.getElementById('mysidenav').style.width ='100%';
      }
      function closeNav() {
        document.getElementById('mysidenav').style.width ='0';
      }
    </script>

    {{-- Input custom js --}}
    @yield('js')

  </head>

  <body>
    <header>
    {{-- Layout Header Start --}}
      <nav class="navbar">
        <span class="openmenu" onclick='openNav()'>
          <i class="fas fa-bars"></i>
        </span>

        <div id="mysidenav" class ="sidemenu">
          <a class="closebtn" onclick='closeNav()'> <i class="fas fa-angle-left"></i></a>
          <a href="/kategorie">전체 카테고리</a>
          <a href="/itemcheck">경매 판매하기</a>
          <a href="/mypage">내 정보</a>
          <a href="/wish_list">내 관심</a>
          <a href="/cahtroom">쪽지</a>
        </div>

        <div class="nav_logo">
          <i class="fas fa-gavel"></i>
          <a href="/">중고땅땅</a>
        </div>

        <ul class="nav_menu">
          <li>
            <div class="dropdown">
              <a class="dropbtn">전체 카테고리</a>
              <div class="dropdown-content">
                <a href="/manclothing?id=남성의류">남성의류</a>
                <a href="/manclothing?id=여성의류">여성의류</a>
                <a href="/manclothing?id=패션잡화">패션잡화</a>
                <a href="/manclothing?id=뷰티미용">뷰티미용</a>
                <a href="/manclothing?id=유아용/출산">유아용/출산</a>
                <a href="/manclothing?id=모바일/태블릿">모바일/태블릿</a>
                <a href="/manclothing?id=가전제품">가전제품</a>
                <a href="/manclothing?id=노트북/데스크탑">노트북/데스크탑</a>
                <a href="/manclothing?id=카메라/캠코더">카메라/캠코더</a>
                <a href="/manclothing?id=가구/인테리어">가구/인테리어</a>
                <a href="/manclothing?id=리빙/생활">리빙/생활</a>
                <a href="/manclothing?id=도서/음반/문구">도서/음반/문구</a>
                <a href="/manclothing?id=티켓/쿠폰">티켓/쿠폰</a>
                <a href="/manclothing?id=스포츠">스포츠</a>
              </div>
            </div>
          </li>
          <li><a href="/itemcheck">경매 판매하기</a></li>
          <li><a href="/mypage">내 정보</a></li>
          <li><a href="/wish_list">내 관심</a></li>
          <li><a href="/cahtroom">쪽지</a></li>
        </ul>

        <div class = "nav_login">
        @if(session('login_ID') == false)
          <li><a href="/Login">Login</a></li>
          <li><a href="/sign_rull">sign up</a></li>
        @else
          <li><a class="nolog" href="/Logout">Log Out</a></li>
        @endif
        </div>
      </nav>
    </header>
    {{-- Layout Header End --}}

    {{-- Layout Content Start --}}
      @yield('content')
    {{-- Layout Content End --}}

    {{-- Layout Footer Start --}}
      <footer class="tang-footer">
        <div class="footbox">
          <div class="footspon">
            <div class="sponcl">
              <div class="footqna ftn">
                <a href="/Servicecenter">Q&A</a>
              </div>
              <div class="sangdam ftn">
                <a href="#">1:1 상담</a>
              </div>
              <div class="sellpage ftn">
                <a href="/itemcheck">경매판매하기</a>
              </div>
            </div>
          </div>
          <div class="pootlist">
            <div class="pooterneau">
              대표이사 : 조경남 개인정보 보호 담당자 : 이명기 사업자등록정보 : 112-45-11468 통신판매업신고 : 2020-경기도덕양구-1147 주소 : 경기도 고양시 덕양구 동헌로 305 세종관 5층 542호 TEL/FAX 031-939-2142<br>
              중고땅땅(주)는 통신판매중개자로서 중고거래마켓 중고땅땅의 거래 당사자가 아니며, 입점판매가 등록한 상품정보 및 거래에 대해 책임을 지지 않습니다.
            </div>
            <div class="pootcopyandgogak">
              <div class="pootcopyright">
                Copyrightⓒjunggotangtang Inc.All rights reserved.
              </div>
              <div class="centernum">
                고객센터 010-0000-0000  제휴문의 ccittest@naver.com
              </div>
            </div>
        </div>
        </div>
      </footer>
      {{-- <div class="foothadan">
        <div class="fottwo">
          <div class="">
            <a href="#">채용정보</a>
          </div>
          <div class="">
            <a href="#">이용약관</a>
          </div>
          <div class="">
            <a href="#">전자금융거래약관</a>
          </div>
          <div class="">
            <a href="#">개인정보 처리방침</a>
          </div>
          <div class="">
            <a href="#">브랜드 광고문의</a>
          </div>
          <div class="">
            <a href="#">판매자 광고센터</a>
          </div>
        </div>
      </div> --}}
    {{-- Layout Footer End --}}

  </body>
</html>
