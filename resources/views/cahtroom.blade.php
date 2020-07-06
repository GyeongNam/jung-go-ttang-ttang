@extends('layout.layout_main')

@section('css')
  <link rel="stylesheet" href="/css/cahrtroom.css">
  <meta name="csrf_token" content="{{csrf_token()}}">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

@endsection

@section('js')
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <script type="text/javascript">
$.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  url: " /api/muser",
  dataType: 'json',
  type: "get",
  success:function(data){
    $user = data.user;
    $id = data.ID;
  },
  error : function(){
    console.log($datas);
  }
});
</script> -->
<script type="text/javascript">
$(function(){
  $('.mesgs').hide();
});

</script>

<script type="text/javascript">
  function user_select(id){
    $('.mesgs').hide();
    $('#mesgs'+id).show();
    // alert(id);
  }
</script>
@endsection

@section('content')

@csrf
<div id="app" class="container">
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
            @if(decrypt(session('login_ID')) != $value->ID )
            <div class="chat_list" onclick="user_select('{{$value->ID}}')">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5> {{$value->ID}}  <span class="chat_date"> @if(!Empty($messageout[$key][0])) {{$messageout[$key][0]->created_at}}  @endif</span></h5>
                  @if(!Empty($messageout[$key][0]))
                  <p> {{$messageout[$key][0]->messege}} </p>
                  @endif
                </div>
              </div>
            </div>
          @endif
          @endif
          @endforeach
          </div>

        </div>
        @foreach ($userID as $key => $value)
        <div class="mesgs" id = "mesgs{{$value->ID}}">
          <div class="msg_history">
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  {{$value->ID}}
                  <p>Test which is a new approach to have all
                    solutions</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Test which is a new approach to have all
                  solutions</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
          @endforeach
      </div>
    </div></div>
  <script src ="{{ asset('js/app.js')}}"></script>


@endsection
