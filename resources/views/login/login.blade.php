<!DOCTYPE html>
<html lang="ko">
<head>
  {{-- Title --}}
  <title>중고땅땅: 로그인</title>

  {{-- Meta --}}
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- css --}}
  {{-- <link rel="stylesheet" href ="/css/layout/footer.css" />
  <link rel="stylesheet" href ="/css/layout/header.css" />
  <link rel="stylesheet" href ="/css/layout/side.css" /> --}}
  <link rel="stylesheet" href="/css/login/login.css">

  {{-- Input custom css --}}
  {{-- @yield('css') --}}

  {{-- js --}}
  <!-- J QUERY -->
  <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/7cfb0a1075.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Do+Hyeon&display=swap" rel="stylesheet">

</head>

<body>
  <div class="login_layout">
    <div class="login_form">
      <form action="{{ url('/loging') }}" method="post">
        @csrf
        <ul>
          <li>
            <img src="/img/tangtang.png"  alt="로고" class="center-block">
          </li>
          <li>
            <label><strong>ID(아이디)</strong><br>
              <input type="text" name="id" id="id" placeholder="ID입력(필수)" required><br>
            </label>
          </li>
          <li>
            <label><strong>Password(비밀번호)</strong><br>
              <input type="password" name="PW" id="pw" placeholder="비밀번호" required><br>
            </label>
          </li>
          <li>
            <button type="submit" class="logbt" id="login_bt" name="login" onclick="return to_submit();">로그인</button>
          </li>
          <li>
            <a href="/find_act">ID/Password 찾기</a>
            <a href="/sign_rull">회원가입</a>
          </li>
        </ul>
      </form>
    </div>
  </div>
</body>
</html>
