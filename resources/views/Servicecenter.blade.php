@extends('layout.layout_main')

@section('css')
  <link rel="stylesheet" href="/css/servicecenter.css">
@endsection

@section('js')
  <script type="text/javascript">
  function openPage(pageName, elmnt, color) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";
  }

  $(function (){
    $(".qnainput").hide();
    $(".rmf").click(function (){
      $(".qnainput").toggle();
    });
    if($(".error").length>0){
      $(".rmf").click(function (){
        alert('로그인이 필요합니다!');
        location.href="/Login";
      });
    }
  });
</script>
<script type="text/javascript">
function add_div(){
  var div = document.createElement('div');
  div.innerHTML = document.getElementById('room_type').innerHTML;
  document.getElementById('field').appendChild(div);
}
function remove_div(obj){
  document.getElementById('field').removeChild(obj.parentNode);
}
</script>
<script type="text/javascript">
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {

    this.classList.toggle("active");

    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
@endsection
@section('content')
  <div class="anrdma">
    <h1 class="Qtitle">Q&A</h1>
    <div class="allcls">
      <div class="servicecenter">
        <input type="radio" id="tab-1" name="show" checked/>
        <input type="radio" id="tab-2" name="show" />
        <input type="radio" id="tab-3" name="show" />
        <div class="tab">
          <label for="tab-1">자주하는 질문</label>
          <label for="tab-2">경매/입찰문의</label>
          <label for="tab-3">Q&A</label>
        </div>
        <div class="content">
          <div class="content-dis">
            <div class="">
              <button class="accordion" type="button" name="button">▶경매는 어떤 방식으로 이루어지나요??</button>
              <div class="panel">
                <p>판매자가 시작가로 지정해 둔 가격 이상 입찰을 하게 되면 경매에 참여하게됩니다.<br> 판매자가 지정한 경매 마감일이 지나면 가장 높은 금액을 제시한 경매참여자 5순위까지 구매 기회가 주어집니다.<br>
                  ex)만약 1순위가 참여하지 않으면 다음 2순위 참여자에게 구매 기회가 주어집니다.
                  <br> 참여한 경매는 상단메뉴에 경매판매하기 버튼을 클릭하면 내가 참여한 경매 페이지에서 확인할 수 있습니다.</p>
                </div>
                <button class="accordion" type="button" name="button">▶낙찰기준은 어떻게되나요?</button>
                <div class="panel">
                  <p>판매자가 지정한 시작 가격보다 높은 가격으로 입찰 한 후<br> 경매마감일까지 가장 높은 금액인 사용자에게 낙찰됩니다.</p>
                </div>
                <button class="accordion" type="button" name="button">▶거래방법은 어떻게되나요??</button>
                <div class="panel">
                  <p>모두 직거래로 이루어집니다. <br>중고 땅땅(주)는 통신판매중개자로서 중고거래마켓 중고땅땅의 거래 당사자가 아니며, 입점판매가 등록한 상품정보 및 거래에 대해 책임을 지지 않습니다.</p>
                </div>
              </div>
            </div>
            <div class="content-dis">
              <div class="">
                <button class="accordion" type="button" name="button">▶경매는 어떤 방식으로 이루어지나요??</button>
                <div class="panel">
                  <p>판매자가 시작가로 지정해 둔 가격 이상 입찰을 하게 되면 경매에 참여하게됩니다.<br> 판매자가 지정한 경매 마감일이 지나면 가장 높은 금액을 제시한 경매참여자 5순위까지 구매 기회가 주어집니다.<br>
                    ex)만약 1순위가 참여하지 않으면 다음 2순위 참여자에게 구매 기회가 주어집니다.
                    <br> 참여한 경매는 상단메뉴에 경매판매하기 버튼을 클릭하면 내가 참여한 경매 페이지에서 확인할 수 있습니다.</p>
                  </div>
                  <button class="accordion" type="button" name="button">▶낙찰기준은 어떻게되나요?</button>
                  <div class="panel">
                    <p>판매자가 지정한 시작 가격보다 높은 가격으로 입찰 한 후<br> 경매마감일까지 가장 높은 금액인 사용자에게 낙찰됩니다! </p>
                  </div>
                  <button class="accordion" type="button" name="button">▶낙찰을 포기할시에 어떻게되나요??</button>
                  <div class="panel">
                    <p>낙찰가를 악용하여 실제로 상품을 원하는 사람에게 </p>
                  </div>
                </div>
              </div>
              <div class="content-dis">
                <table id="qnat">
                  <thead>
                    <tr>
                      <th width="4%"></th>
                      <th>번호</th>
                      <th>제목</th>
                      <th>작성자(ID)</th>
                      <th>작성일</th>
                    </tr>
                  </thead>

                  <tbody>


                    @foreach($qna as $key => $value)
                      <tr>
                        <td><div class="arrow"></div></td>
                        <td>{{$value->qna_number}}</td>
                        <td id="qnatext">{{$value->qna_title}}</td>
                        <td>{{$value->qna_id}}</td>
                        <td>{{$value->created_at}}</td>
                      </tr>
                      <tr>
                        <td colspan="5">

                          <form class="123"  action="/qna_contents/{{$value->qna_number}}" method="post">
                            @csrf
                          <label for="">비밀번호를 입력하세요!</label><br>
                          비밀번호 : <input type="text" class="pass" name="password" value="">
                          <button type="submit" class="123" name="button">확인</button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div id="field"></div>
                <div class="guljaxsung">
                  <button class="rmf" type="button"  name="button">글 작성</button>

                </div>

                @if(session()->has('login_ID'))
                  <form class="" action="{{url('/qna11')}}" method="get">
                    @csrf
                    <div class="qnainput" >
                      <div class="">
                        <div class="">
                          <div class="qnawkrtjd">
                            작성자 : {{$data[0]->ID}}
                          </div>
                          <div class="">
                            비밀번호 : <input type="text" class="dadada" name="qnapass" value="">
                          </div>
                        </div>
                        <div >
                        <label>제목</label>
                        <input type="text" name="nanana" value="">
                      </div>
                        <label>문의내용</label>
                      </div>
                      <textarea name="qnatext" class="but1" rows="8" cols="80"></textarea>
                      <button type="submit" class="but" name="button" onclick="add_div();">작성하기</button>
                    </div>
                  </form>
                @else
                  <div class="error"></div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
      $(function(){
        $(".but").click(function(){
          var da =$(".but1").val();
          var dada=$(".dadada").val();
          var na=$(".nanana").val();
          if(da==0){
            alert("글을 적어주세요");
            return false;
          }
          else if(dada==0){
            alert("비밀번호를 지정해주세요");
            return false;
          }
          else if (na==0) {
            alert("제목을 입력하세요");
            return false;
          }
        })
      })
    </script>
    <script type="text/javascript">
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {

        this.classList.toggle("active");

        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
    </script>
    <script type="text/javascript">
    var akk = document.getElementsByClassName("ddts");
    var i;

    for (i = 0; i < akk.length; i++) {
      akk[i].addEventListener("click", function() {

        this.classList.toggle("active");

        var passwordpanel = this.nextElementSibling;
        if (passwordpanel.style.display === "block") {
          passwordpanel.style.display = "none";
        } else {
          passwordpanel.style.display = "block";
        }
      });
    }

    if('틀린 비밀번호입니다'=='{{Session::get('alert')}}'){
      alert('{{Session::get('alert')}}');
    }

    </script>
  </div>
</div>
</div>
<div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){

  $("#qnat tr:odd").addClass("odd");
  $("#qnat tr:not(.odd)").hide();
  $("#qnat tr:first-child").show(); //열머리글 보여주기

  $("#qnat tr.odd").click(function(){
    $(this).next("tr").toggle();
    $(this).find(".arrow").toggleClass("up");
  });
});
</script>


</div>
</div>

@endsection
