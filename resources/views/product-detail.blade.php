@extends('layout.layout_main')
@section('title')
  중고땅땅-상품 상세정보
@endsection
@section('css')
  <link rel="stylesheet" href="/css/product-detail.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
      alert("관심항목에서 해제되었습니다.");
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
    }
  });
});
</script>

{{-- 기존 지도 --}}
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
{{-- 카카오지도API --}}
<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=8a82332350bc18d282d500e361ee79da&libraries=services"></script>
<script type="text/javascript" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
<script>
$(document).ready(function(){



  var mapContainer = document.getElementById('map'), // 지도를 표시할 div
  mapOption = {
    center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
    level: 3 // 지도의 확대 레벨
  };

  // 지도를 생성합니다
  var map = new kakao.maps.Map(mapContainer, mapOption);
  // 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
  var mapTypeControl = new kakao.maps.MapTypeControl();

  // 지도에 컨트롤을 추가해야 지도위에 표시됩니다
  // kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
  map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);

  // 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
  var zoomControl = new kakao.maps.ZoomControl();
  map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);
  //판매자가 등록한 주소
  var address = '{{$myproduct[0]->roadAddress}}';
  //판매자의 아이디
  var id = '{{$myproduct[0]->seller_id}}';
  // 말풍선 내용
  var contentString	=
  '<div class="mapst">' +
  '<h3>직거래 위치:</h3>'+
  '<h4>'+address+'</h4>'+
  '<p>'+id+'님의. 직거래 위치입니다!</p>' +
  '</div>';
  iwRemoveable = true; // removeable 속성을 ture 로 설정하면 인포윈도우를 닫을 수 있는 x버튼이 표시됩니다

  // 주소-좌표 변환 객체를 생성합니다
  var geocoder = new kakao.maps.services.Geocoder();

  // 주소로 좌표를 검색합니다
  geocoder.addressSearch(address, function(result, status) {
    // 정상적으로 검색이 완료됐으면
    if (status === kakao.maps.services.Status.OK) {

      var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

      // 결과값으로 받은 위치를 마커로 표시합니다
      var marker = new kakao.maps.Marker({
        map: map,
        position: coords
      });

      // 인포윈도우로 장소에 대한 설명을 표시합니다
      var infowindow = new kakao.maps.InfoWindow({
        content: contentString,
        removable : iwRemoveable
      });
      // 마커에 클릭이벤트를 등록합니다
      kakao.maps.event.addListener(marker, 'click', function() {
        // 마커 위에 인포윈도우를 표시합니다
        infowindow.open(map, marker);
      });
      // infowindow.open(map, marker);

      // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
      map.setCenter(coords);
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
<script type="text/javascript">
function largcomments(data) {
  var login =  1{{Session::has("login_ID")}};
  console.log(data);
  if (login == 1) {
    alert('로그인이 필요합니다!');
    return false;
  }
  if(login==11){
    if($("#largcoment"+data).css('display') == 'none'){
      $("#largcoment"+data).css('display','block');
      console.log('2');
    }
    else{
      $("#largcoment"+data).css('display','none');
      console.log('1');
    }
  }
}
</script>
<script type="text/javascript">
function commentliketoggle(data, datas) {
  var commlike = document.getElementById('likecoment');
  var login =  1{{Session::has("login_ID")}};
  var carheart = datas;

  // alert(data);
  if (login == 1) {
    alert('로그인이 필요합니다!');
    return false;
  }
  if(login ==11){
    if(carheart == 1){
      alert("좋아요 삭제!");
    }
    else{
      alert("댓글을 좋아합니다.");
    }
  }
}

function commentliketoggles(data) {
  var login =  1{{Session::has("login_ID")}};

  // alert(data);
  if (login == 1) {
    alert('로그인이 필요합니다!');
    return false;
  }
}
</script>
@endsection
@section('content')
  <!-- The Modal -->
  <div id="myModal" class="modal2">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <h1 style="text-align:center; margin-bottom:2%;">신고하기</h1>
      <hr>
      <form class="" action="/police/{{$myproduct[0]->item_number}}" method="post" style="text-align:center;">
        @csrf
        <select class="po1" name="po-ca"  id="sel" style="height:30px; margin:3%; width:60%;" >
          <option value="0">선택하세요</option>
          <option value="광고(상점홍보,낚시글,도배글)">광고(상점홍보,낚시글,도배글)</option>
          <option value="물품정보 부정확(카테고리,가격,사진)">물품정보 부정확(카테고리,가격,사진)</option>
          <option value="거래 금지 품목(담배,주류,장물)">거래 금지 품목(담배,주류,장물)</option>
          <option value="언어폭력(비방,욕설,성희롱)">언어폭력(비방,욕설,성희롱)</option>
          <option value="기타사유">기타사유</option>
        </select>
        <div class="">
          <textarea cols="50" rows="10" name="te" class="tex1" style="width:60%; margin-left:3%;" placeholder="입력해주세요"></textarea>
        </div>
        <div class="" style="text-align:center;">
          <button type="submit" class="butt" name="police" style="width:20%; height:20px; margin-top:3%;" value="{{$myproduct[0]->item_number}}">신고하기</button>
        </form>
      </div>
    </form>
  </div>
  <script>
  $(function(){
    $(".butt").click(function(){
      var se =$("#sel").val();
      var da = $(".tex1").val();
      if (da == 0 ) {
        alert("사유를 작성해주세요");
        return false;
      }
      else if (se==0) {
        alert("선택해주세요");
        return false;
      }
    })
  })

  </script>

</div>


<div class="content">
  @if ($myproduct[0]->item_success ==0)
    <h1 style="text-align:center; margin:5%;">이미 판매종료된 상품입니다.</h1>
  @else
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

                <div class="dtitnbt">
                <div class="d_title">
                  {{$myproduct[0]->item_name}}
                </div>
                {{-- // 버튼 추가 --}}
                <div class="bt-Wla" style="float:right;">
                  <div class="Wla_click">
                    <button  id="myBtn" class="singo" type="button" >
                      <i class="fas fa-exclamation-circle"></i>
                      <span>신고</span>
                    </button>
                  </div>
                </div>
                </div>
                <div class="time_price">
                  <div class="d_price">
                    현재 최고가 :
                  </div>
                  @if ($max == 0)
                    <div class="d_price_info" name="" val="">
                      {{ number_format($myproduct[0]->item_startprice)}}
                      <span>원</span>
                    </div>
                  @else
                    <div class="d_price_info" name="" val="">
                      {{ number_format($max)}}
                      <span>원</span>
                    </div>
                  @endif
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
                    <img src="/img/heart.png" width="16" height="16" alt="좋아요 한 항목 아이콘">
                    <div class="like_num intf" name="" >
                      @if ($like !=0)
                        <span>{{$like}}</span>
                      @else
                        <span>0</span>
                      @endif
                    </div>
                  </div>
                  <div class="view isk">
                    <img src="/img/eye.png" width="16" height="16" alt="상품 조회수">
                    <div class="see_num intf" name="">
                      @if ($count[0]->visit_count !=0)
                        <span>{{$count[0]->visit_count}}</span>
                      @else
                        <span>0</span>
                      @endif
                    </div>
                  </div>
                  <div class="time isk">
                    <img src="/img/clock.png" width="16" height="16" alt="업로드된시간">
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
              @if(session()->has('login_ID'))
                @if(decrypt(session()->get('login_ID')) == $myproduct[0]->seller_id)
                  <script>
                  $(function(){
                    $('.ckadu').attr('disabled',true);
                    $('.wjsghk').attr('disabled',true);
                    $('.unWla').attr('disabled',true);
                    $('.singo').attr('disabled',true);
                  })
                  </script>
                  <a href="/bidding-info/{{$myproduct[0]->item_number}}"><button class="ckadu" type="submit" name="rudaockadu"> 경매참여 </button></a>
                  {{-- <button class="wjsghk"type="button" name="callseller">연락하기</button> --}}
                @else
                  <a href="/bidding-info/{{$myproduct[0]->item_number}}"><button class="ckadu" type="submit" name="rudaockadu"> 경매참여 </button></a>
                  {{-- <button class="wjsghk"type="button" name="callseller">연락하기</button> --}}
                @endif
              @endif
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
                    @if(!empty($data[0]->user_image))
                    <img class="seller_img" name="" src="/img/user/{{$data[0]->user_image}}" alt="">
                    @else
                    <img class="seller_img" name="" src="/img/mp_img.png" alt="">
                    @endif
                    <span class="seller_name_link" name="">
                      {{$myproduct[0]->seller_id}}
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="seller_other_product">
              <div class="otr_prod_box">
                <div class="otr_prod_item_label">
                  <span>판매자가 경매중인 물품</span>
                </div>
                @for($key=0; $key < count($myStats); $key++)
                  @if($key < 4)
                    @if($myStats[$key]->item_success == 1)
                    <a href="/product-detail/{{$myStats[$key]->item_number}}">
                      <div class="otr_prod">
                      <div class="otr_prod_item"  style=" cursor: pointer;" onclick="">
                        <img class="otr_prod_item_img" name="" src="/img/item/{{$myStats[$key]->item_picture}}" alt="">
                        <div class="otr_prod_item_np">
                          <span class="otr_name" name="">{{$myStats[$key]->item_name}}</span><br>
                          <span class="otr_price" name="">현재가격{{ number_format($myStats[$key]->item_startprice)}}</span>
                        </div>
                      </div>
                    </div>
                    </a>
                    @endif
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
            {{-- 카카오map API --}}
            <div id="map"></div>
            {{-- <div id="gmap"></div>        // 직거래 위치(구글 지도) --}}
            <div class="info-typing">
              <div class="sc-info_sodyd">
                {{$myproduct[0]->item_info}}
              </div>
              <div class="deal_cat_location">
                <div class="deal_cat">
                  <div class="catgo">
                    카테고리
                  </div>
                  <div class="">
                    <a href="/manclothing?id={{$myproduct[0]->item_category}}"><span>{{$myproduct[0]->item_category}}</span></a>
                  </div>
                </div>
                {{-- <div class="pro_tag">
                  <div class="tag_name">
                    <img src="" alt="">
                    상품태그
                  </div>
                  <div class="taglist">
                    <ul>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                    </ul>
                    <a href="#">#아이패드</a>
                    <a href="#">#아이패드에어</a>
                    <a href="#">#태블릿</a>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
        </div>

        <div class="buyer_comment">
          <div class="best_comment">
            <div class="">
              <h3>Best 댓글</h3>
            </div>
            <div class="">
              <div class="comment_naeyoung">
                @if(!empty($comm2))
                  <div class="comment_people">
                    {{$comm2->comment_id}}
                  </div>
                  <div class="value_comment">
                    <p> {{$comm2->comments}} </p>
                  </div>
                  <div class="largecommentgood">
                    <button class="datlike" id="comentlike" type="button" name="comlike" value="">
                      <img id="likecoment" src="/img/b_gkxm.png" alt="찜 아이콘" width="16" height="16">
                    </button>
                    <span>{{$comm->becount}}</span>
                  </div>
                @else
                  <div class="comment_people">
                    Best 댓글이 없습니다.
                  </div>
                @endif
              </div>

            </div>
          </div>
          <div class="people_comment">
            <div class="dat_lab">
              <h2>댓글</h2>
            </div>
            <form class="datgul" action="/product-comment/{{$myproduct[0]->item_number}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="combox">
                <div class="comcontent">
                  <div class="comment_munie">
                    <textarea class="comment_text" name="comment_texts" id="comment_texts" rows="8" cols="80" placeholder="제품문의 댓글 입력" required></textarea>
                  </div>
                  <div class="comment_fontlength">
                    <div class="sc-fontlength dlqfurrmf">0 / 200</div>
                    <button type="submit" class="comment_dunglok" name="button">등록</button>
                  </div>
                </div>
              </form>
              <div class="comment_new">
                <div class="">
                  <h3>전체 댓글</h3>
                </div>
                @foreach ($commentitem as $key => $value)
                  <div class="create_comment">
                    <div class="neadcomt">
                      <div class="comment_naeyoung">
                        <div class="comment_people">
                          {{$value->comment_id}}
                        </div>
                        <div class="value_comment">
                          <p>{{$value->comments}}</p>
                        </div>
                        <form class="" action="/commentlike/{{$value->comment_num}}"method="get">
                          <div class="largecommentgood">
                            @if(!empty($likecomment[$key]))
                              <button class="datlike" id="comentlike" type="submit" name="comlike" value="{{$value->comment_num}}" onclick="commentliketoggle({{$value->comment_num}},{{count($likecomment[$key])}})">

                                @if(count($likecomment[$key]) <1)
                                  <img id="likecoment" src="/img/heart.png" alt="찜 아이콘" width="16" height="16">
                                @else
                                  <img id="likecoment" src="/img/b_gkxm.png" alt="찜 아이콘" width="16" height="16">
                                @endif
                              @else
                                <button type="button" name="button" onclick="commentliketoggles({{$value->comment_num}})"><img id="likecoment" src="/img/heart.png" alt="찜 아이콘" width="16" height="16"></button>
                              @endif
                            </button>
                            @if(count($commentlike[$key]) != 0)
                              <span>{{count($commentlike[$key])}}</span>
                            @else
                              <span>0</span>
                            @endif
                          </div>
                        </form>
                        <form class="" action="/product-largecomment/{{$myproduct[0]->item_number}}/{{$value->comment_num}}" method="post">
                          @csrf
                          <div class="val_re">
                            <button class="datlike" type="button" name="button" onclick="largcomments({{$value->comment_num}})">답글 쓰기</button>
                          </div>
                        </div>
                        <div id="largcoment{{$value->comment_num}}"class="larg">
                          <div class="reaq"></div>
                          <div id="laco_texts" class="reco_texts {{$value->comment_num}}">
                            <textarea class="largcomment_text {{$value->comment_num}}" name="lecomment_texts" id="lecomment_texts" rows="8" cols="80" placeholder="답글 입력"required></textarea>
                            <button type="submit" name="button">답글달기</button>
                          </div>
                        </div>
                      </form>
                      @for($i = 0; $i<$lacount; $i++)
                        @if(!empty($largcommentitem[$key][$i]))
                          <div class="reaq"></div>
                          <div class="newlargecomment">
                            <div class="comment_people">
                              {{$largcommentitem[$key][$i]->largecomment_id}}
                            </div>
                            <div class="largvalue_comment">
                              <p>{{$largcommentitem[$key][$i]->largecomments}}</p>
                            </div>
                            <form class="" action="/product-lecomment/{{$myproduct[0]->item_number}}/{{$value->comment_num}}/{{$largcommentitem[$key][$i]->largecomment_num}}" method="post">
                              @csrf
                              @if (session()->has('login_ID'))
                                @if (decrypt(session()->get('login_ID')) == $largcommentitem[$key][$i]->largecomment_id)
                                  <div class="delete_area">
                                    <a href="/largcomment/{{$largcommentitem[$key][$i]->largecomment_num}}/{{$largcommentitem[$key][$i]->largecomm_item}}">
                                      <button class="" type="button" name="button">X</button>
                                    </a>
                                    <button id="reco_btn" class="reco_btn" type="button" name="button" onclick="recomments({{$largcommentitem[$key][$i]->largecomment_num}})">수정하기</button>
                                  </div>
                                  <div id="hidcoment{{$largcommentitem[$key][$i]->largecomment_num}}"class="hiderecomment">
                                    <div id="reco_texts" class="reco_texts {{$largcommentitem[$key][$i]->largecomment_num}}">
                                      <textarea class="recomment_text {{$largcommentitem[$key][$i]->largecomment_num}}" name="lecomment_texts" id="lecomment_texts" rows="8" cols="80" placeholder="수정할 답글 입력" required> {{$largcommentitem[$key][$i]->largecomments}} </textarea>
                                      <div class="comment_fontlength">
                                        <div class="sc-fontlength dlqfurrmff">0 / 200</div>
                                        <button type="submit" name="button">수정완료</button>
                                      </div>
                                    </div>
                                  </div>
                                @endif
                              @endif
                            </form>
                          </div>
                        @endif
                      @endfor
                      <form class="" action="/product-recomment/{{$myproduct[0]->item_number}}/{{$value->comment_num}}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                <textarea class="recomment_text {{$value->comment_num}}" name="recomment_texts" id="recomment_texts" rows="8" cols="80" placeholder="수정할 댓글 입력" required>{{$value->comments}}</textarea>
                                <div class="comment_fontlength">
                                  <div class="sc-fontlength dlqfurrmff">0 / 200</div>
                                  <button type="submit" name="button">수정완료</button>
                                </div>
                              </div>
                            </div>
                          @endif
                        @endif
                      </form>
                    </div>
                  </div>
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
                <button class="modifypro" type="submit" name="button">경매 수정</button>
              </form>
            </div>
            <div class="auction_del">
              <button class="delproduct" id="del_detailpage" type="button" name="button" >경매 삭제</button>
            </div>
          @endif
        @endif
      </div>
    </div>
  @endif
</div>

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
<script>
//모델창
var modal = document.getElementById('myModal');

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>
@endsection
