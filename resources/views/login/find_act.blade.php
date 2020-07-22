  <!DOCTYPE html>
  <html lang="ko">
  <head>
    {{-- Title --}}
    <title>ID/PW 찾기!</title>

    {{-- Meta --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- css --}}
    {{-- <link rel="stylesheet" href ="/css/layout/footer.css" />
    <link rel="stylesheet" href ="/css/layout/header.css" />
    <link rel="stylesheet" href ="/css/layout/side.css" /> --}}
      <link rel="stylesheet" href="/css/login/account.css">
    {{-- Input custom css --}}
    {{-- @yield('css') --}}

    {{-- js --}}
    <!-- J QUERY -->
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7cfb0a1075.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Do+Hyeon&display=swap" rel="stylesheet">
    <script type="text/javascript">

    function idselect(){
      var names = $('#my_names').val();
      var phone = $('#phone').val();
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/selectid",
        dataType: 'json',
        data: {names:names, phone:phone},
        type: "post",
        success:function(data){
          var datas = data.data;
          console.log(datas);
          if(datas == 0)
          alert("일치하는 회원정보가 없습니다.")
          else {
            alert("메일로 아이디를 발송했습니다.");
          }
        },
        error : function(){
          console.log("실패");
        }
      });
    }

    function pwselect(){
      var id = $('#my_id').val();
      var phone = $('#phon_num').val();
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/selectpw",
        dataType: 'json',
        data: {id:id, phone:phone},
        type: "post",
        success:function(data){
          var datas = data.data;
          console.log(datas);
          if(datas == 0)
          alert("일치하는 회원정보가 없습니다.")
          else {
            alert("메일로 비밀번호를 발송했습니다.");
          }
        },
        error : function(){
          console.log("실패");
        }
      });
    }
    </script>
  </head>

  <body>
    <div class="find_account">
      <div class="find_id">
        <form action="{{url('/selectid')}}" method="post">
          @csrf
          <ul>
            <li>
              <!--아이디 입력-->
              <label><strong>ID찾기</strong><br>
                <p>내 정보에 등록한 정보로<br>아이디를 찾을 수 있습니다.</p>
                <input type="text" name="names" id="my_names" placeholder="이름을 입력하세요" required><br>
              </label>
            </li>
            <li>
              <!--휴대폰 번호 입력-->
              <label><strong>전화번호 입력</strong><br>
                <input type="text" name="phone" id="phone" placeholder="전화번호를 입력하세요" required><br>
              </label>
            </li>
            <li>
              <button type="button" id="find_id" name="find" onclick="idselect()">아이디 찾기</button>
            </li>
          </form >
        </div>
        <div class="find_password">
          <form action="{{url('/selectpw')}}" method="post">
            @csrf
            <ul>
              <li>
                <label><strong>비밀번호찾기</strong><br>
                  <input type="text" name="id" id="my_id" placeholder="ID 입력" required><br>
                </label>
              </li>
              <li>
                <label>
                  <input type="text" name="phone" id="phon_num" placeholder="전화번호를 입력하세요" required><br>
                </label>
              </li>
              <li>
                <button type="button" id="find_pw" name="find_pass" onclick="pwselect()">비밀번호 찾기</button>
              </li>
            </ul>
          </form>
                  <a class="main" href="/">메인으로</a>
        </div>
      </div>
    </body>
    </html>
