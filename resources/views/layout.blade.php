<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <!--부트스트랩 4 CDN-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <title>@yield('title', '중고땅땅')</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">대한민국 중고경매의 모든것!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExample01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">전체 카테고리</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">경매 판매하기</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">경매 판매하기</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SNS</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">고객센터</a>
            <a class="dropdown-item" href="#">거래SNS</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-md-0">
        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
      </form>
    </div>
  </nav>

  <!--헤더 부분-->
    <div class="container">
    <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" href="#">Korea no.1 sell it</a>
      </div>
      <div class="col-3 d-flex justify-content-between align-items-center">
        <a class="col-4 btn btn-sm btn-outline-secondary" href="#">Sign up</a>

        <a class="col-3 btn btn-sm btn-outline-secondary" href="/login">log in</a>

        <a class="col-3 btn btn-sm btn-outline-secondary"  href="#">log out</a>

      </div>
    </div>
  </header>

  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample09">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">공지사항</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">사기예방</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">공동구매</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">인기품목</a>
          </li>
          <!--드롭다운 목록-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown09">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </nav>
  <div class="container p-4 my-4 border">
    <p><h1>@yield('page_header', '경매를 시작하세요!')</h1></p>
    @yield('content')
    <footer class="bd-footer p-4 p-md-5 mt-8 text-center text-muted bg-light">
<div class="container-fluid">
<ul class="bd-footer-links">
<li><a href="https://www.joongbu.ac.kr/home">중부대학교</a></li>
<li><a href="https://www.naver.com">네이버</a></li>
<li><a href="https://getbootstrap.com/docs/4.4/examples/">Examples</a></li>
<li><a href="https://getbootstrap.com/docs/4.4/about/overview/">About</a></li>
</ul>
<p class="mb-0">Designed by <a href="https://www.instagram.com/jin__uu0.jpeg/?hl=ko">Dorumamu</a> with the help of <a href="https://github.com/JGN97/CCIT_TEST.git">CCIT_A team our Project</a>.</p>
<p class="mb-0">중고 땅땅 1.0 ver</p>
</div>
</footer>
  </body>
</html>
