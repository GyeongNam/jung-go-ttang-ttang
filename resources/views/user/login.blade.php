@extends('layout.layout_main')

@section('title')
  중고땅땅 로그인!
@endsection

@section('css')
    <link rel="stylesheet" href="/css/login.css">

@section('content')
    <div class="login_layout">
        <img src="/img/main_img.png"  alt="로고" class="center-block">
      <div class="login_form">
        <form>
          <label>ID(아이디)<br>
            <input type="text" name="id" id="id" placeholder="ID입력(필수)" required><br>
          </label>

          <label>Password(비밀번호)<br>
            <input type="text" name="PW" id="pw" placeholder="비밀번호" required><br>
          </label>
           <button type="submit" id="login_bt" name="login" onclick="return to_submit();">로그인</button>

           <a href="#">ID/Password 찾기</a>
           <a href="/sign_up">회원가입</a>
        </form>
      </div>
    </div>

@endsection
