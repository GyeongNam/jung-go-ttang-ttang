<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles -->
        <script src="https://kit.fontawesome.com/7cfb0a1075.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href ="{{asset('/css/headcss-1.css')}}" />
        <link rel="stylesheet" href ="{{asset('/css/sidemenu-1.css')}}" />
        <link rel="stylesheet" href ="{{asset('/css/footer.css')}}" />
        <script scr="{{asset('sidemenu.js')}}"></script>
        <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Do+Hyeon&display=swap" rel="stylesheet">

        <nav class="navbar">
          <div class="nav_logo">

            <span class="openmenu" onclick='openNav()'>
              <i class="fas fa-gavel fa-5" aria-hidden="true"></i>중고땅땅</span>
          </div>

          <ul class="nav_menu">
            <li><a href="#">전체 카테고리</a></li>
            <li><a href="#">경매 판매하기</a></li>
            <li><a href="#">내 정보</a></li>
            <li><a href="#">내 관심</a></li>
            <li><a href="#">쪽지</a></li>
          </ul>

          <div class = "nav_login">
            <li><a href="#">Login</a></li>
            <li><a href="#">Register</a></li>
          </div>
        </nav>
    </head>

    <body>
      <div id="mysidenav" class="sidenav">
		<a href="#" class="closebtn" onclick='closeNav()'><i class="fas fa-gavel"></i>중고땅땅</a>
		<a href="#">전체 카테고리</a>
		<a href="#">경매 판매하기</a>
		<a href="#">내 관심</a>
		<a href="#">내 정보</a>
		<a href="#">SNS</a>
	</div>
  <script>
  		function openNav() {
  			document.getElementById('mysidenav').style.width = '250px';
  		}
  		function closeNav() {
  			document.getElementById('mysidenav').style.width = '0';
  		}
  	</script>
    </body>

    <footer class="tang-footer">
      <ul>
        <li><a href="https://www.joongbu.ac.kr/home">중부대학교</a></li>
        <li><a href="https://www.naver.com">네이버</a></li>
        <li><a href="#">Examples</a></li>
        <li><a href="#">About</a></li>
      </ul>
        <p class="mb-0">Designed by <a href="https://www.instagram.com/jin__uu0.jpeg/?hl=ko">Dorumamu</a> with the help of <a href="https://github.com/JGN97/CCIT_TEST.git">CCIT_A team our Project</a>.</p>
        <p class="mb-0">중고 땅땅 1.0 ver</p>
    </footer>
</html>