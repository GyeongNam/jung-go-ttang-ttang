<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>로그인</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
				<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
				<!-- jQuery library -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
				<!-- Popper JS -->
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
				<!-- Latest compiled JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    </head>

    <body>


    <!--상단 네비게이션 바 시작-->
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


    <!--메인 배너(점보트론 이용)-->
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
      <h1 class="display-4 font-italic">중고땅땅!</h1>
      <p>대한민국 no.1 중고물품 경매 사이트!</p>
    </div>

<style>
.center{
width: 430px;
margin: 99px auto;
position: relative;
}
.center   .header{
font-size: 30px;
font-weight: bold;
color: white;
padding: 30px 0 30px 25px;
background: #212121;
border-bottom: 1px solid #370e3f;
border-radius: 5px 5px 0 0;
}
.center form{
position: absolute;
background: white;
width: 100%
padding: 50px 10px 0 30px;
box-sizing: border-box;
border: 1px solid #6d1c7d;
border-radius:0 0 5px 5px;
}
form input{
height:60px;
width:100%;
padding:0 10px;
border-radius: 3px;
border: 1px solid silver;
font-size: 20px;
outline: none;
}
form input[type="password"]{
margin-top: 20px ;
}
form i{
position: absolute;
font-size:25px;
color: grey;
margin: 15px 0 0 -45px;
}
i.fa-lock{
margin-top: 35px;
}
form input[type="submit"]{
margin-top:30px;
margin-bottom: 40px;
width:200px;
height:45px;
color:white;
cursor: pointer;
line-height: 45px;
border-radius:45px;
border-radius: 5px;
background: #212121;
}
form input[type="submit"]:hover{
background:#491254;
}
form a{
text-decoration: none;
font-size: 18px;
color: #212121;
padding:0 0 0 20px;
}
  }

</style>

				<div class="center">
					<div class="header"> L O G I N</div>
					<form>
						<input type="text" placeholder="아이디를 입력하시오">
						<i class="far fa-envelope"></i>
						<input type="password" placeholder="비밀번호를 입력하시오">
						<i class="fas fa-lock"></i>
						<input type="submit" value="로그인">
						<a href="#">회원가입</a>
            	<a href="#">계정찾기</a>
						<form>
						</div>



    </body>
</html>
