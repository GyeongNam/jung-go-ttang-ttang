<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>쪽지</title>

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
width: 1000px;
margin: 99px auto;
position: relative;
}
.center   .header{
font-size: 30px;
font-weight: bold;
color: white;
padding: 30px 0 30px 25px;
background: #747474;
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
.contents {
  line-height:30px;
  border-radius:0 25px 0 25px;
  text-align:center;
  vertical-align:middle;
  font-size:19px;
  height:30px;
  padding:13px;
}
.table {
	max-width:90%;
	margin:20px auto;
	border-collapse:collapse;
}
th,td {
	padding:10px 20px;
	min-height:40px;
	font-size:14px;
	border:1px solid #a0b5c7;
}
th {
	width:120px;
	color:#fff;
	background:#747474;
}
td {
	padding:10px 20px;
	font-size:14px;
	border:1px solid #a0b5c7;
	background:#fff;

}
.close {
	padding:0 auto;
	height:10px;
	line-height:40px;
	font-size:17px;
}
</style>
        	<div class="center">
            <div class="header">내 쪽지함</div>

<div class="contents">
  <thead>
  <tr>
  <pre>  <th><button type="button"><a href="#">받은쪽지</a></button></th>              <th><button type="button"><a href="#">보낸쪽지</a></button></th>                 <th><button type="button"><a href="#">쪽지쓰기</a></button></th>           </pre>
  </tr>
</thead>
</div>
<hr>
        		<div>

        			<table class="table">
        			<caption>
        				전체받은쪽지0통
        			</caption>

        			<thead>
        			<tr>
        				<th>보낸사람</th>
        				<th>보낸시간</th>
        				<th>읽은시간</th>
        				<th>관리</th>
        			</tr>
        			</thead>
        			<tbody>
        			<tr>
        				<td>leemk2448</td>
        				<td>2020.04.12</td>
        				<td>04.12.23:10</td>
        				<td></td>
        			</tr>
        			</tbody>
        			</table>
        		</div>

        		<div class="close">
        			<button type="button" onclick="window.close();">메인화면</button>
        		</div>
        	</div>

        </body>
        </html>
