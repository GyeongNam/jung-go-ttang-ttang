@extends('layout.layout_main')

@section('css')
  <link rel="stylesheet" href="/css/cahrtroom.css">
  <meta name="csrf_token" content="{{csrf_token()}}">
@endsection

@section('js')

@endsection
@section('content')
@csrf
  <div id="app"class="row">
    <div class="column" style="background-color:#a6c497;">
      <div class="talk_user_content">
        <div class="talk_user">
          <div class="userbox">
            <div class="userimg">
              <a href="#"></a>
            </div>
            <div class="user_name">
              12qwqq
            </div>
            <div class="talksumnali">
              어이 젊은친구 신사답게행동해.
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="massageview" style="background-color:#bbb;">
      <div class="textcontent">
        <div class="otherusertalk" id="talktalk">
          <div class="textnayong">
            <p id="ottalk">알로핳</p>
          </div>
          <div class="texttime">
            <p id="ottalk">12:12 pm</p>
          </div>
        </div>
        <div class="usertalk" id="talktalk">
          <div class="talknayoung"  id="talknayoung">
            <div class="textnayong">
              <p>500천원 깎ㄷ아줘</p>
            </div>
            <div class="texttime">
              <p>12:20pm</p>
            </div>
          </div>
        </div>
      </div>
      <div class="chatinsert">
        <div class="">
          <textarea id="inputmessage"name="name" rows="8" cols="80"></textarea>
        </div>
        <div class="chatbtn">
          <button type="button" name="button">전송</button>
        </div>
      </div>
    </div>
  </div>
  <script src ="{{ asset('js/app.js')}}"></script>
  <!-- <script>
  Echo.channel('ccit')
      .listen('WebsocketEvent', (e) => {
          console.log(e);
      })
  </script> -->
@endsection
