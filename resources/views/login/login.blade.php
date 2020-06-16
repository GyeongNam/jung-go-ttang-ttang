@extends('layout.layout_main')

@section('title')
  중고땅땅 로그인!
@endsection

@section('css')
    <link rel="stylesheet" href="/css/login/login.css">

@section('content')
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
            <button type="submit" id="login_bt" name="login" onclick="return to_submit();">로그인</button>
          </li>
          <li>
            <a href="/find_act">ID/Password 찾기</a>
            <a href="/sign_rull">회원가입</a>
          </li>
         </ul>
        </form>
      </div>
    </div>

@endsection
