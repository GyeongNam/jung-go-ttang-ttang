<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="resources\css\bootstrap.css">
        <title>login</title>


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
<style>


@import url('https://font.googleapis.com/css? family=Noto+Sans+TC&display=swap');
body{
margin: 0;
padding: 0;
background: radial-gradient(#a429bc,#9225a7,#7f2092);
height: 100vh;
overflow: hidden;
font-family:  'Noto Sans TC', sans-serif;
}


.center{
width: 430px;
margin: 130px auto;
position: relative;
}


.center   .header{
font-size: 28px;
font-weight: bold;
color: white;
padding: 25px 0 30px 25px;
background:  #5c1769;
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
height:50px;
width:90%;
padding:0 10px;
border-radius: 3px;
border: 1px solid silver;
font-size: 18px;
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
margin-top:40px;
margin-bottom: 40px;
width:130px;
height:45px;
color:white;
cursor: pointer;
line-height: 45px;
border-radius:45px;
border-radius: 5px;
background: #5c1769;
}
form input[type="submit"]:hover{
background:#491254;
}
form a{
text-decoration: none;
font-size: 18px;
color: #7f2092;
padding:0 0 0 20px;
}

<style type="text/css">
  .jumbotron{
    background-image: url('image\green.jpg');
    background-size:cover;
    text-shadow; black 0.2em 0.2em 0.2em;
    color: white;
    </style>

  }


    </head>

    <body>

			<div class="container">
			<div class="jumbotron">
			<h1 class= "text-center">중 고 땅 땅! </h1>
				<p class="text-center">대한민국 NO.1중고 물품 경매 사이트!</p>




				<div class="center">
					<div class="header"> L O G I N</div>
					<form>
						<input type="text" placeholder="아이디를 입력하시오">
						<i class="far fa-envelope"></i>
						<input type="password" placeholder="비밀번호를 입력하시오">
						<i class="fas fa-lock"></i>
						<input type="submit" value="로그인">
						<a href="#">회원가입</a>
						<form>
						</div>



    </body>
</html>
