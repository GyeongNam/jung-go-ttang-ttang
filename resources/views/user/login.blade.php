@extends('layout.layout_main')

@section('title')
  중고땅땅 로그인!
@endsection

@section('css')
    <link rel="stylesheet" href="/css/login.css">

@section('content')
    <div class="login_layout">
      <div class="login_form">
        <form>
          <ul>
            <li>
              <img src="/img/main_img.png"  alt="로고" class="center-block">
            </li>
            <li>
              <label><strong>ID(아이디)</strong><br>
                <input type="text" name="id" id="id" placeholder="ID입력(필수)" required><br>
              </label>
            </li>
            <li>
              <label><strong>Password(비밀번호)</strong><br>
                <input type="text" name="PW" id="pw" placeholder="비밀번호" required><br>
              </label>
            </li>
            <li>
            <button type="submit" id="login_bt" name="login" onclick="return to_submit();">로그인</button>
          </li>
          <li>
            <a href="#">ID/Password 찾기</a>
            <a href="/sign_up">회원가입</a>
        </form>
      </div>
    </div>

@endsection
