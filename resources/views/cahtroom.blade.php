@extends('layout.layout_main')
@section('title')
  채팅하기
@endsection
@section('css')
  <link rel="stylesheet" href="/css/cahrtroom.css">
  <meta name="csrf_token" content="{{csrf_token()}}">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

@endsection

@section('js')
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript">
$(function(){
  $('.mesgs').hide();
  $('.bell').hide();
});

</script>

<script type="text/javascript">
  function user_select(id){
    $('.mesgs').hide();
    $('#mesgs'+id).show();
    // alert(id);

    // console.log($('#msg_history'+id).last());
    $("#msg_history"+id).scrollTop($("#msg_history"+id)[0].scrollHeight);
  }
</script>


@endsection

@section('content')

@csrf
<div
id="app"
class="container">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              {{-- <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div> --}}
            </div>
          </div>

          <div class="inbox_chat">
            @foreach ($userID as $key => $value)
            @if(session()->has('login_ID'))
            @if(decrypt(session('login_ID')) != $value->user1_ID )

            <div class="chat_list" onclick="user_select('{{$value->user1_ID}}')">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  {{$value->user1_ID}}
                  <span class="bell" id="bell{{$value->user1_ID}}"><i class="fas fa-bell"></i></span>
                  @foreach ($messages as $keys => $values)
                    @if($values->user2_ID == decrypt(session('login_ID')) and $values->user1_ID == $value->user1_ID)
                      <h5>
                        <span class="chat_date{{$value->user1_ID}}">
                          {{$values->created_at}}
                        </span>
                      </h5>
                      <p class="me_data{{$value->user1_ID}}"> {{$values->messege}} </p>
                      @break
                    @elseif($values->user1_ID == decrypt(session('login_ID')) and $values->user2_ID == $value->ID)
                      <h5>
                        <span class="chat_date{{$value->user1_ID}}">
                          {{$values->created_at}}
                        </span>
                      </h5>
                      <p class="me_data{{$value->user1_ID}}"> {{$values->messege}} </p>
                      @break
                    @endif
                   @endforeach
                </div>
              </div>
            </div>
          @endif
          @endif
          @endforeach
          </div>

        </div>
        @foreach ($userID as $key => $value)
        <div class="mesgs" id = "mesgs{{$value->user1_ID}}">
          <div class="msg_history" id = "msg_history{{$value->user1_ID}}" >

            <div class="">
              거래 확정 버튼과 거래 완료 버튼이 있어야할 공간
            </div>

            @foreach($message as $keys => $values)
              @if($values->user2_ID == decrypt(session('login_ID')) and $values->user1_ID == $value->user1_ID)
                <div class="incoming_msg" id="incoming_msg{{$value->user1_ID}}">
                  <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                  <div class="received_msg">
                    <div class="received_withd_msg">
                      {{$value->user1_ID}}

                      <p>{{$values->messege}}</p>
                      <span class="time_date"> {{$values->created_at}} </span></div>
                  </div>
                </div>
              @elseif($values->user1_ID == decrypt(session('login_ID')) and $values->user2_ID == $value->user1_ID)
                  <div class="outgoing_msg" id="outgoing_msg{{$value->user1_ID}}">
                    <div class="sent_msg">
                      <p>{{$values->messege}}</p>
                      <span class="time_date"> {{$values->created_at}} </span> </div>
                  </div>
                @endif
            @endforeach
            <div class="bottom"></div>
          </div>
          <div class="type_msg">
            <div class="input_msg_write">

              <input type="text" class="write_msg{{$value->user1_ID}}"onKeypress="javascript:if(event.keyCode==13) {messegesend('{{$value->user1_ID}}')}" placeholder="Type a message" />
              <button class="msg_send_btn" type="button" onclick="messegesend('{{$value->user1_ID}}')"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div></div>
  <script src ="{{ asset('js/app.js')}}"></script>
  <script type="text/javascript">
  window.Echo.channel('ccit')
      .listen('WebsocketEvent', (e) => {
        console.log(e);
        if(e.id2 == '{{decrypt(session('login_ID'))}}'){
          var adds =  "<div class='incoming_msg'>"
          +  "<div class='incoming_msg_img'> "
          + "<img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'>"
          + "</div>"
          + "<div class='received_msg'>"
          + "<div class='received_withd_msg'>"
          +  e.id1
          + "<p>" + e.message + "</p>"
          + "<span class='time_date'>"+ e.time + "</span></div>"
          + "</div></div>";
          // console.log(adds);
          $('#msg_history'+e.id1).append(adds);
          $('.chat_date'+e.id1).text(e.time);
          $('.me_data'+e.id1).text(e.message);
          $("#msg_history"+e.id1).scrollTop($("#msg_history"+e.id1)[0].scrollHeight);

        }

        // console.log(e);
        // console.log(e.message);
        // console.log(e.id1);
        // console.log(e.id2);
        // console.log(e.time);
      });

  </script>

  <script type="text/javascript">
    function messegesend(id){
      var messege = $('.write_msg'+id).val();
      // console.log(messege);
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/messegesend",
        data: {messege:messege, id:id},
        type: "post",
        success:function(data)
        {
          var add =  "<div class='outgoing_msg'>"
          +  "<div class='sent_msg'>"
          +    "<p>" + data.data.messege + "</p>"
          +  "<span class='time_date'>" + data.date + "</span>"
          + "</div>"
          +"</div>";

          $('.write_msg'+id).val('');
          $('#msg_history'+id).append(add);
            // console.log(data);
          $('.chat_date'+id).text(data.date);
          $('.me_data'+id).text(data.data.messege);
          $("#msg_history"+id).scrollTop($("#msg_history"+id)[0].scrollHeight);

        },
        error : function(){
          console.log("실패");
        }
      });
      $('.write_msg'+id).val('');
    }
  </script>

@endsection
