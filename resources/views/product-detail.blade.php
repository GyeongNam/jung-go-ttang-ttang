@extends('layout.layout_main')

@section('css')
<link rel="stylesheet" href="/css/product-detail.css">
@endsection

@section('js')
<script type="text/javascript">
function toggleImg() {
  var likhet = document.getElementById('likep');
  var data =  1{{Session::has("login_ID")}};
  var chilheart = {{$likeheart}}
  //console.log(dsds);

  if (data == 1) {
    alert('로그인이 필요합니다!');
    return false;
  }
  if(chilheart ==1) {
    alert("관심항목에서 헤제되었습니다.");
  }
  else{
    alert("관심항목에 추가되었습니다.");
  }
}


//변경하는 함수 테스트중 절대 건들지마셈

var slideIndex = 1; //이미지에 접근하는 인덱스
window.onload = function(){ //문서가 로딩 된 이후 호출한다.
  showSlides(slideIndex); //
}


function plusSlides(n) {
  showSlides(slideIndex += n); //슬라이드 배열을 하나씩 추가한다.
}

function showSlides(n) {
  var slides = document.getElementsByClassName("mySlidess"); //mySlidess라는 클래스명에 접근한다.
  //  console.log(slides.length);
  if (n > slides.length) {
    slideIndex = 1

  }
  if (n < 1) {
    slideIndex = slides.length //배열값 초기화
  }
  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; //반복문으로 전체 이미지를 display.none 로 감춘다.
  }
  slides[slideIndex-1].style.display = "block"; //block 처리를 해서 화면에 나타낸다.
}



</script>
<!-- <script type="text/ajax">
function toggleImg() {
var likhet = document.getElementById('likep');
console.log('likhet');
$.ajax({
url:"/wish_lst",
method: "post",
dataType:"json",
data: {likejim : likhet},
success:function(data){

if(likhet.src.match("heart")) {
alert("관심항목에 추가되었습니다.");
likhet.src="/img/b_gkxm.png";


}
else if(likhet.src.match("b_gkxm")) {
alert("관심항목에서 해제되었습니다.");
likhet.src="/img/heart.png";
}
}
});
}
</script> -->

<script type="text/javascript">
$(function (){


  $(".comment_dunglok").click(function(){
    var data =  1{{Session::has("login_ID")}};
    console.log(data);
    if (data == 1) {
      alert('로그인이 필요합니다!');
      // return false;
    }
    else if (data == 11) {
      if ($(".comment_text").val()=="") {
        alert("내용을 입력해주세요!");
        $(".comment_text").focus();
      }
      // else{
      //   $.ajax({
      //     url:"/product-detail",
      //     dataType:"json",
      //     data: {  }
      //     success:function(){
      //       alert('댓글등록 완료!');
      //     }
      //   })
      // }
    }
  });
});
</script>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript"  async defer src="http://maps.google.com/maps/api/js?key=AIzaSyAEk_8ahIgPS73zIwRlvRUO8bYYDvae35U&callback=initMap" ></script>
<script type="text/javascript">
$(document).ready(function() {
  var address = '{{$myproduct[0]->roadAddress}}';
  // console.log(address);
  // var url = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyAEk_8ahIgPS73zIwRlvRUO8bYYDvae35U&sensor=false&language=ko&address='+address;
  // console.log(url);
  var geocoder = new google.maps.Geocoder();
  // var myLatlng = new google.maps.LatLng(35.837143,128.558612); // 위치값 위도 경도
  // var Y_point			= 35.837143;		// Y 좌표
  // var X_point			= 128.558612;		// X 좌표
  // var zoomLevel		= 18;				// 지도의 확대 레벨 : 숫자가 클수록 확대정도가 큼
  // var myLatlng = new google.maps.LatLng();
  // var markerTitle		= "대구광역시";		// 현재 위치 마커에 마우스를 오버을때 나타나는 정보
  var markerMaxWidth	= 300;				// 마커를 클릭했을때 나타나는 말풍선의 최대 크기
  var id = '{{$myproduct[0]->seller_id}}';
  // 말풍선 내용
  var contentString	=
  '<div>' +
  '<h2>직거래 위치:</h2>'+
  '<h3>'+address+'</h3>'+
  '<p>'+id+'님의. 직거래 위치입니다!</p>' +
  '</div>';

  var mapOptions = {
    zoom: 18,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  //마커 클러스터?


  var map = new google.maps.Map(document.getElementById('map'), mapOptions);
  geocoder.geocode( { 'address': address}, function(results, status) {
    console.log(results);
    if (status == 'OK') {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location
      });
      var infowindow = new google.maps.InfoWindow(
        {
          content: contentString,
          maxWizzzdth: markerMaxWidth
        }
      );
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
});
</script>

<script type="text/javascript">

function recomments(data) {
  if($("#hidcoment"+data).css('display') == 'none'){
    $("#hidcoment"+data).css('display', 'block');
  }
  // console.log("#hidcoment"+data);
  else {
    $("#hidcoment"+data).css('display', 'none');
  }
}
</script>


@endsection
@section('content')
<div class="content">
  <div class="detail_page">
    <div class="detail_head">
      <div class="pr_deta_pic">
        <div class="detailimg_list">
          <div class="slideshow-container">
            <div class="mySlidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_picture}}" alt=""  val=""/>
            </div>
            @if($myproduct[0]->item_pictureup != null)
            <div class="mySlidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_pictureup}}" alt=""  val=""/>
            </div>
            @endif
            @if($myproduct[0]->item_pictureback != null)
            <div class="mySlidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_pictureback}}" alt=""  val=""/>
            </div>
            @endif
            @if($myproduct[0]->item_picturebehind != null)
            <div class="mySlidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_picturebehind}}" alt=""  val=""/>
            </div>
            @endif
            @if($myproduct[0]->item_picturefront != null)
            <div class="mySlidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_picturefront}}" alt=""  val=""/>
            </div>
            @endif
            @if($myproduct[0]->item_pictureleft != null)
            <div class="mySlidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_pictureleft}}" alt=""  val=""/>
            </div>
            @endif
            @if($myproduct[0]->item_picturerigth != null)
            <div class="mySlidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_picturerigth}}" alt=""  val=""/>
            </div>
            @endif
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>
        </div>

      </div>
      <div class="detail_product_info">
        <div class="dpbox">
          <div class="d_info">
            <div class="tit_pri">
              <div class="d_title">
                {{$myproduct[0]->item_name}}
                {{-- // 버튼 추가 --}}
                <div class="bt-Wla" style="float:right;">
                  <form class="" action="/police/{{$myproduct[0]->item_number}}" method="post">
                    <div class="Wla_click">
                      <button   class="unWla" type="submit" name="police" value="{{$myproduct[0]->item_number}}">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>신고</span>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="time_price">
                <div class="d_price">
                  현재 최고가 :
                </div>
                <div class="d_price_info" name="" val="">
                  {{ number_format($max)}}
                  <span>원</span>
                </div>
              </div>
              <div class="gm_dday">
                <div class="deadtime_lab">
                  경매 마감일 : {{$myproduct[0]->item_deadline}}
                </div>
              </div>
            </div>
            <div class="d_kyeword">
              <div class="lvt">
                <div class="like isk">
                  <img src="/img/heart.png/" width="16" height="16" alt="좋아요 한 항목 아이콘">
                  <div class="like_num intf" name="" >
                    @if ($like !=0)
                    <span>{{$like}}</span>
                    @else
                    <span>0</span>
                    @endif
                  </div>
                </div>
                <div class="view isk">
                  <img src="/img/eye.png/" width="16" height="16" alt="상품 조회수">
                  <div class="see_num intf" name="">
                    @if ($count[0]->visit_count !=0)
                    <span>{{$count[0]->visit_count}}</span>
                    @else
                    <span>0</span>
                    @endif
                  </div>
                </div>
                <div class="time isk">
                  <img src="/img/clock.png/" width="16" height="16" alt="업로드된시간">
                  <div class="time_num intf" name="" id="timeplace">
                    {{$myproduct[0]->created_at->diffForHumans()}}
                  </div>
                </div>
              </div>
              <div class="d_kyeword_info">
                <div class="pd_st">
                  <div class="pd_mak">
                    제조사 :
                  </div>
                  <div class="mak_info tnam" name="">
                    {{$myproduct[0]->item_maker}}
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_by">
                    구매일 :
                  </div>
                  <div class="by_info tnam" name="">
                    {{$myproduct[0]->item_buy}}
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_cat">
                    상품 카테고리 :
                  </div>
                  <div class="cat_info tnam" name="">
                    {{$myproduct[0]->item_category}}
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_opcl">
                    상품 개봉여부 :
                  </div>

                  <div class="opcl_info tnam" name="">
                    @if($myproduct[0]->item_open != 1)
                    <span>미개봉</span>
                    @else
                    <span>개봉</span>
                    @endif
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_spric">
                    경매 시작가격 :
                  </div>
                  <div class="spric_info tnam" name="">
                    {{ number_format($myproduct[0]->item_startprice)}}
                    <span>원</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bt_box">
            <div class="bt-Wla">
              <form class="" action="{{url('/wish_lst')}}" method="get">
                <div class="Wla_click">
                  <button   class="unWla" type="submit" name="likejim" value="{{$myproduct[0]->item_number}}" onclick="toggleImg()">
                    @if($likeheart<1)
                    <img id="likep" src="/img/heart.png" alt="찜 아이콘" width="16" height="16">
                    @else
                    <img id="likep" src="/img/b_gkxm.png" alt="찜 아이콘" width="16" height="16">
                    @endif
                    <span>찜</span>
                  </button>
                </form>
              </div>
            </div>
            <a href="/bidding-info/{{$myproduct[0]->item_number}}"><button class="ckadu" type="submit" name="rudaockadu"> 경매참여 </button></a>
            <button class="wjsghk"type="button" name="callseller">연락하기</button>
          </div>
        </div>
      </div>
      <div class="detail_seller_info">
        <div class="seller_page">
          <div class="seller">
            판매자 정보
          </div>
          <div class="seller_info">
            <div class="seller_name">
              <div class="">

              </div>
              <a href="#"><img src=""></a>
              <div class="seller_profile">
                <div class="name_pdt">
                  <img class="seller_img" name="" src="/img/user/{{$data[0]->user_image}}" alt="">
                  <a class="seller_name_link" name="" href="#">{{$myproduct[0]->seller_id}}</a>
                  <a class="productrottn" name="" href="#">상품 2</a>
                </div>
              </div>
            </div>
          </div>
          <div class="seller_other_product">
            <div class="otr_prod_box">
              <div class="otr_prod_item_label">
                <span>판매자가 경매중인 물품</span>
              </div>
              @for($key=0; $key < count($myStat) ; $key++)
              @if($key < 3)
              <a href="/product-detail/{{$myStat[$key]->item_number}}">
                <div class="otr_prod_item"  style=" cursor: pointer;" onclick="">
                  <img class="otr_prod_item_img" name="" src="/img/item/{{$myStat[$key]->item_picture}}" alt="">
                  <div class="otr_prod_item_np">
                    <span class="otr_name" name="">{{$myStat[$key]->item_name}}</span><br>
                    <span class="otr_price" name="">현재가격{{ number_format($myStat[$key]->item_startprice)}}</span>
                  </div>
                </div>
              </a>
              @endif
              @endfor
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="detail_info_typing">
    <div class="typinginfo">
      <div class="tkdvnainfo">
        <div class="sc-info_detail">상품 정보</div>
        <div class="sc-info-typing">
          <!-- <div id="floating-panel">
          <b>Mode of Travel: </b>
          <select id="mode">
          <option value="DRIVING">Driving</option>
          <option value="WALKING">Walking</option>
          <option value="BICYCLING">Bicycling</option>
          <option value="TRANSIT">Transit</option>
        </select>
      </div> -->
      <div id="map"></div>        // 직거래 위치(구글 지도)
      <!-- <div id="map2"></div>        // 현재 내 위치에서 직거래 위치까지의 거리(구글 지도) -->
      <div class="sc-info_sodyd">
        {{$myproduct[0]->item_info}}
      </div>
    </div>
  </div>
  <div class="deal_cat_location">
    <div class="deal_cat">
      <div class="catgo">
        <img src="" alt="">
        카테고리
      </div>
      <div class="">
        <a href="#"><span>모바일/태블릿</span></a>
      </div>
    </div>
    <div class="pro_tag">
      <div class="tag_name">
        <img src="" alt="">
        상품태그
      </div>
      <div class="taglist">
        <a href="#">#아이패드</a>
        <a href="#">#아이패드에어</a>
        <a href="#">#태블릿</a>
      </div>
    </div>
  </div>
  <div class="buyer_comment">
    <div class="people_comment">
      <div class="dat_lab">
        <h2>댓글달기</h2>
      </div>
      <form class="" action="/product-comment/{{$myproduct[0]->item_number}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="combox">
          <div class="comment_munie">
            <textarea class="comment_text" name="comment_texts" id="comment_texts" rows="8" cols="80" placeholder="제품문의 댓글 입력" required></textarea>
          </div>
          <div class="comment_fontlength">
            <div class="sc-fontlength dlqfurrmf">0 / 200</div>
            <button type="submit" class="comment_dunglok" name="button">등록</button>
          </div>
        </form>

        <div class="comment_new">
          @foreach ($commentitem as $key => $value)
          <form class="" action="/product-recomment/{{$myproduct[0]->item_number}}/{{$value->comment_num}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="create_comment">
              <div class="neadcomt">
                <div class="comment_naeyoung">
                  <div class="comment_people">
                    {{$value->comment_id}}
                  </div>
                  <div class="value_comment">
                    <p>{{$value->comments}}</p>
                  </div>
                  <div class="val_re">
                    <button type="button" name="button" onclick="largcomments({{$value->comment_num}})">답글 쓰기</button>
                  </div>
                </div>

                <div id="largcoment{{$value->comment_num}}"class="largecomment">
                  <div id="laco_texts" class="reco_texts {{$value->comment_num}}">
                    <textarea class="largcomment_text {{$value->comment_num}}" name="recomment_texts" id="recomment_texts" rows="8" cols="80" placeholder="답글 입력"></textarea>
                    <button type="submit" name="button">답글달기</button>
                  </div>
                </div>
                @foreach ($commentitem as $key => $value)
                <div class="newlargecomment">
                  <div class="comment_people">
                    {{$value->comment_id}}
                  </div>
                  <div class="value_comment">
                    <p>{{$value->comments}}</p>
                  </div>
                </div>
                @endforeach
                @if(session()->has('login_ID'))
                @if(decrypt(session()->get('login_ID')) == $value->comment_id)
                <div class="delete_area">
                  <a href="/recomment/{{$value->comment_num}}/{{$value->comm_item}}">
                    <button class="del_comment" type="button" name="button">삭제하기</button>
                  </a>
                  <button id="reco_btn" class="reco_btn" type="button" name="button" onclick="recomments({{$value->comment_num}})">수정하기</button>
                </div>
                <div id="hidcoment{{$value->comment_num}}"class="hiderecomment">
                  <div id="reco_texts" class="reco_texts {{$value->comment_num}}">
                    <textarea class="recomment_text {{$value->comment_num}}" name="recomment_texts" id="recomment_texts" rows="8" cols="80" placeholder="수정할 댓글 입력">{{$value->comments}}</textarea>
                    <div class="comment_fontlength">
                      <div class="sc-fontlength dlqfurrmff">0 / 200</div>
                      <button type="submit" name="button">수정완료</button>
                    </div>
                  </div>
                </div>
                @endif
                @endif
              </div>
            </div>
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
<div class="btn_cl">
  @if(session()->has('login_ID'))
  @if(decrypt(session()->get('login_ID')) == $myproduct[0]->seller_id)
  <div class="auction_revise">
    <form class="" action="{{url('/product-Modify')}}" method="get">
      <input type="hidden" name="item_key" value="{{$myproduct[0]->item_number}}">
      <button type="submit" name="button">경매 수정</button>
    </form>
  </div>
  <div class="auction_del">
    <button id="del_detailpage" type="button" name="button" >경매 삭제</button>
  </div>
  @endif
  @endif
</div>
</div>
</div>
<script type="text/javascript">
function largcomments(data) {
  var data =  1{{Session::has("login_ID")}};
  if (data == 1) {
    alert('로그인이 필요합니다!');
    return false;
  }
  if($("#largcoment"+data).css('display') == 'none'){
    $("#largcoment"+data).css('display', 'block');
  }
  // console.log("#hidcoment"+data);
  else {
    $("#largcoment"+data).css('display', 'none');
  }
}
</script>
<script type="text/javascript">
//comment textarea 체크
$('.comment_text').keyup(function (e){
  var content = $(this).val();
  $('.dlqfurrmf').html("("+content.length+" / 최대 200자)");    //글자수 실시간 카운팅

  if (content.length > 200){
    alert("최대 200자까지 입력 가능합니다.");
    $(this).val(content.substring(0, 200));
    $('.dlqfurrmf').html("(200 / 최대 200자)");
  }
});

//comment textarea 체크
$('.recomment_text').keyup(function (e){
  var content = $(this).val();
  $('.dlqfurrmff').html("("+content.length+" / 최대 200자)");    //글자수 실시간 카운팅

  if (content.length > 200){
    alert("최대 200자까지 입력 가능합니다.");
    $(this).val(content.substring(0, 200));
    $('.dlqfurrmff').html("(200 / 최대 200자)");
  }
});


</script>
<script type="text/javascript">
//경매 삭제 버튼
$('#del_detailpage').click(function(){
  if(confirm("경매를 삭제 하시겠습니까? 삭제된 경매는 낙찰 받을 수 없습니다!") == true){
    location.href="/remove/{{$myproduct[0]->item_number}}/{{$id}}";
    alert("삭제되었습니다.");
  }
  else{
    return false;
  }
});
</script>
@endsection
