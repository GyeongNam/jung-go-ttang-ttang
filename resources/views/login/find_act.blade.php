@extends('layout.layout_main')

@section('title')
  ID/PW 찾기!
@endsection

@section('css')
  <link rel="stylesheet" href="/css/account.css">
@endsection

@section('content')
<div class="find_account">
  <div class="find_id">
    <form>
      <ul>
        <li>
          <!--아이디 입력-->
          <label><strong>ID찾기</strong><br>
            <p>내 정보에 등록한 정보로<br>아이디를 찾을 수 있습니다.</p>
            <input type="text" name="name" id="my_name" placeholder="이름입력" required><br>
          </label>
        </li>
        <li>
          <!--휴대폰 번호 입력-->
          <label><strong>이메일 주소</strong><br>
            <input type="text" name="email" id="mail" placeholder="example@naver.com" required><br>
          </label>
        </li>
        <li>
        <button type="submit" id="find_id" name="find" onclick="return to_submit();">아이디 찾기</button>
      </li>
    </form>
  </div>
  <hr class="line">
  <div class="find_password">
    <form>
      <ul>
        <li>
          <label><strong>비밀번호찾기</strong><br>
            <input type="text" name="id" id="my_id" placeholder="ID입력" required><br>
          </label>
        </li>
        <li>
          <label>
            <input type="text" name="phone" id="phon_num" placeholder=" ((-)없이 입력) " required><br>
          </label>
        </li>
        <li>
          <button type="submit" id="find_pw" name="find_pass" onclick="return to_submit();">비밀번호 찾기</button>
        </li>
      </ul>
    </form>
  </div>
</div>
@endsection
