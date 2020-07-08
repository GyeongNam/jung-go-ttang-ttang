@extends('layout.layout_main')

@section('title')
  대한민국 No.1 중고땅땅!
@endsection

@section('css')
  <link rel="stylesheet" href="/css/main.css">
  <!--<link rel="stylesheet" href="/css/swiper.css">-->
@endsection
@section('js')
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
  {{-- <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8a82332350bc18d282d500e361ee79da&libraries=services"></script>
  <script>
  // console.log(a);
  $(document).ready(function(){

    var mapContainer = document.getElementById('map'), // 지도를 표시할 div
    mapOption = {
      center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
      level: 7 // 지도의 확대 레벨
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

    // // 마커 클러스터러를 생성합니다
    // var clusterer = new kakao.maps.MarkerClusterer({
    //     map: map, // 마커들을 클러스터로 관리하고 표시할 지도 객체
    //     averageCenter: true, // 클러스터에 포함된 마커들의 평균 위치를 클러스터 마커 위치로 설정
    //     minLevel: 10 // 클러스터 할 최소 지도 레벨
    // });
    // 주소-좌표 변환 객체를 생성합니다
    var geocoder = new kakao.maps.services.Geocoder();
    // var contentString   =
    // '<div>' +
    // '<h2>직거래 위치:</h2>'+
    // '<h3>'+address+'</h3>'+
    // '<p>'+id+'님의. 직거래 위치입니다!</p>' +
    // '</div>';
    var positions = $('.maparry');
    var rodcount = {{count($road)}};
    console.log(rodcount);
    var add = [];
    for(i=0; i<positions.length;i++){
      add.push(positions[i].value);
    }
    console.log(add);
    // 주소로 좌표를 검색합니다
    for(let i=0; i <add.length; i++){
      console.log(add[i]);
      geocoder.addressSearch(add[i], function(result, status) {

        // 정상적으로 검색이 완료됐으면
        if (status === kakao.maps.services.Status.OK) {

          var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

          // 결과값으로 받은 위치를 마커로 표시합니다
          var marker = new kakao.maps.Marker({
            map: map,
            position: coords
          });
          // 마커에 커서가 오버됐을 때 마커 위에 표시할 인포윈도우를 생성합니다
          var iwContent = '<div style="padding:5px;">'+add[i]+'</div>'; // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다

          // 인포윈도우로 장소에 대한 설명을 표시합니다
          var infowindow = new kakao.maps.InfoWindow({
            content: iwContent
          });

          // 마커에 마우스오버 이벤트를 등록합니다
          kakao.maps.event.addListener(marker, 'mouseover', function() {
            // 마커에 마우스오버 이벤트가 발생하면 인포윈도우를 마커위에 표시합니다
            infowindow.open(map, marker);
          });

          // 마커에 마우스아웃 이벤트를 등록합니다
          kakao.maps.event.addListener(marker, 'mouseout', function() {
            // 마커에 마우스아웃 이벤트가 발생하면 인포윈도우를 제거합니다
          infowindow.close();
          });
          // infowindow.open(map, marker);
          // // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
          map.setCenter(coords);
        }
      });
    }
  });
</script> --}}
@endsection

@section('content')

  @if (Session::has('message'))
    <script type="text/javascript">
    alert("{{Session::get('message')}}");
    </script>
  @endif

  <div class="speace">
    <div class="article">
      <div class="right_side_form">
        <!-- 퀵 메뉴, top button -->
        <div class="right_menu">
          <div class="quickBox"><p>최근 본 상품</p>
            <div class="re_view">
              <div class="view_box">
                <div class="view_list">
                  <a class="view_item" href="#">
                    <img src="/img/product.png" alt="상품 이미지">
                  </a>
                  <a class="view_item" href="#">
                    <img src="/img/product.png" alt="상품 이미지">
                  </a>
                  <a class="view_item" href="#">
                    <img src="/img/product.png" alt="상품 이미지">
                  </a>
                </div>
              </div>
            </div>
            <div class="btn_top">
              <p class="btn_top"><a href="#none">top</a></p>
            </div>
          </div>
          <script type="text/javascript">
          /* -----top 버튼, 스크롤 퀵 메뉴----- */
          var quickBox = $('.quickBox'); //퀵메뉴 코딩한 div의 클래스 네임
          var quick_top = 300; // 퀵메뉴 배너 이미지의 기준이 되는 높이 값입니다.
          quickBox.css('top', $(window).height() );
          $(document).ready(function(){
            $(window).scroll(function(){
              quickBox.stop();
              quickBox.animate( { "top": $(document).scrollTop() + quick_top + "px" }, 500 ); //숫자값을 변경하면 속도변화
            });
          });
          /* -----top 버튼----- */
          $(function() {
            $(".btn_top").click(function() {
              $('html, body').animate({
                scrollTop : 0
              }, 400);
              return false;
            });
          });

          function printTime()

          {
            var clock = document.getElementById("clock");
            var now = new Date();
            clock.textContent =
            //textContent : 노드와 그 자손의 텍스트 콘텐츠를 표현합니다.
            now.getFullYear() +"년" + (now.getMonth()+1)+"월"
            //getFullYear()년도 출력함수
            //getMonth()월을 출력하는 함수, 0부터 시작하기때문에 +1을해줘야함
            +now.getDate()+"일" + now.getHours()+"시"
            //getDate()날짜를 출력하는 함수, getHours()시간 출력함수
            +now.getMinutes()+"분" + now.getSeconds()+"초";
            //getMinutes()분을 출력함수 , getSeconds() 초를 출력함수
            setTimeout("printTime()", 1000);
            // setTimeout함수를 통해 원하는 함수를 1초간격으로 출력해줌
          }
          window.onload = printTime;
          //웹브라우저 내의 모든 요소가 준비되어야 printTime 기능을 실행한다.
          </script>
        </div>
        <div class="main_form">

          <h1><strong>현재 경매 건수는?&nbsp;&nbsp;&nbsp;<b class="product_count">{{$count}}</b> 건 입니다.</strong></h1>
          <strong>현재 시간은? :<span id="clock"></span></strong>
          <!-- 메인 슬라이드 광고배너 -->
          <div class="swiper">
            <div class="slideshow-container">

              <div class="mySlides fade">
                <img href="#" src="/img/pg1.jpg">
              </div>

              <div class="mySlides fade">
                <img href="#" src="/img/pg2.jpg">
              </div>

              <div class="mySlides fade">
                <img href="#" src="/img/pg3.png">
              </div>

            </div>
          </div>
          {{-- @foreach($road as $key => $value)
            <input  id="maparry{{$value->item_number}}" class ="maparry" type="hidden"  value="{{$value->roadAddress}}">
          @endforeach
          <div id="map" style="width:auto; height:300px;">
            <div class="wa d">
              <a href="#" class="hi"></a>
            </div>
          </div> --}}
          <!--제품 정보 표시-->
          <div class="product">
            <div class="categorybar">
              <a href="#man">남성의류</a>
              <a href="#woman">여성의류</a>
              <a href="#fashion">패션잡화</a>
              <a href="#beauty">뷰티미용</a>
              <a href="#mobile">모바일</a>
              <a href="#Elec_products">가전제품</a>
              <a href="#laptop">노트북/PC</a>
            </div>
            <div class="best_item">


              <div class="item_list">
                <h2>인기상품</h2>

                @foreach($topview as $key => $value)
                  @if($key < 10)
                    @if ($value->item_success==1)
                    <div class="item">
                      <a href="/product-detail/{{$value->item_number}}">
                        <div OnClick="location.href ='/' " style="cursor:pointer;" >
                          <img id="itmg" src="/img/item/{{$value->item_picture}}" alt="">
                          <div class="whghltn">
                            <img src="/img/eye.png/" width="16" height="16" alt="상품 조회수">
                            조회수:{{$value->visit_count}}
                          </div>
                        </div><br>
                        <a href="#">상품이름:{{$value->item_name}}</a><br>
                        <a href="#">상품가격: {{number_format($value->item_startprice)}}원 </a>
                      </a>
                    </div>
                    @endif
                  @endif
                @endforeach
              </div>


              <div class="item_list">
                <div class="list_hd">
                  <h2 id="man">남성의류 <a href="/manclothing?id=남성의류">전체보기</a></h2>
                </div>
                @foreach ($cate as $key => $value)
                  @if($key < 10)
                    @if ($value->item_success==1)
                    <div class="item">
                      <a href="/product-detail/{{$value->item_number}}">
                        <div OnClick="location.href ='/' " style="cursor:pointer;" >
                          <img id="itmg" src="/img/item/{{$value->item_picture}}" alt="">
                          <div class="whghltn">
                            <img src="/img/eye.png/" width="16" height="16" alt="상품 조회수">
                            조회수:{{$value->visit_count}}
                          </div>
                        </div><br>
                        <a href="#">상품이름:{{$value->item_name}}</a><br>
                        <a href="#">상품가격 : {{number_format($value->item_startprice)}}원 </a>
                      </a>
                    </div>
                    @endif
                  @endif
                @endforeach
              </div>
              <div class="item_list">
                <div class="list_hd">
                  <h2 id="woman">여성의류 <a href="/manclothing?id=여성의류">전체보기</a></h2>
                </div>
                @foreach ($catef as $key => $value)
                  @if($key < 10)
                    @if ($value->item_success==1)
                      <div class="item">
                        <a href="/product-detail/{{$value->item_number}}  ">
                          <div OnClick="location.href ='/' " style="cursor:pointer;" >
                            <img id="itmg" src="/img/item/{{$value->item_picture}}" alt="">
                            <div class="whghltn">
                              <img src="/img/eye.png/" width="16" height="16" alt="상품 조회수">
                              조회수:{{$value->visit_count}}
                            </div>
                          </div><br>
                          <a href="#">상품이름:{{$value->item_name}}</a><br>
                          <a href="#">상품가격 : {{number_format($value->item_startprice)}}원 </a>
                        </a>
                      </div>
                    @endif
                  @endif
                @endforeach
              </div>
              <div class="item_list">
                <div class="list_hd">
                  <h2 id="fashion">패션잡화 <a href="/manclothing?id=패션잡화">전체보기</a></h2>
                </div>
                @foreach ($categ as $key => $value)
                  @if($key < 10)
                    @if ($value->item_success==1)
                      <div class="item">
                        <a href="/product-detail/{{$value->item_number}}  ">
                          <div OnClick="location.href ='/' " style="cursor:pointer;" >
                            <img id="itmg" src="/img/item/{{$value->item_picture}}" alt="">
                            <div class="whghltn">
                              <img src="/img/eye.png/" width="16" height="16" alt="상품 조회수">
                              조회수:{{$value->visit_count}}
                            </div>
                          </div><br>
                          <a href="#">상품이름:{{$value->item_name}}</a><br>
                          <a href="#">상품가격 : {{number_format($value->item_startprice)}}원 </a>
                        </a>
                      </div>
                    @endif
                  @endif
                @endforeach
              </div>
              <div class="item_list">
                <div class="list_hd">
                  <h2 id="beauty">뷰티미용 <a href="/manclothing?id=뷰티미용">전체보기</a></h2>
                </div>
                @foreach ($cateh as $key => $value)
                  @if($key < 10)
                    @if ($value->item_success==1)
                      <div class="item">
                        <a href="/product-detail/{{$value->item_number}}  ">
                          <div OnClick="location.href ='/' " style="cursor:pointer;" >
                            <img id="itmg" src="/img/item/{{$value->item_picture}}" alt="">
                            <div class="whghltn">
                              <img src="/img/eye.png/" width="16" height="16" alt="상품 조회수">
                              조회수:{{$value->visit_count}}
                            </div>
                          </div><br>
                          <a href="#">상품이름:{{$value->item_name}}</a><br>
                          <a href="#">상품가격 : {{number_format($value->item_startprice)}}원 </a>
                        </a>
                      </div>
                    @endif
                  @endif
                @endforeach
              </div>
              <div class="item_list">
                <div class="list_hd">
                  <h2 id="mobile">모바일 <a href="/manclothing?id=모바일">전체보기</a></h2>
                </div>
                @foreach ($catej as $key => $value)
                  @if($key < 10)
                    @if ($value->item_success==1)
                      <div class="item">
                        <a href="/product-detail/{{$value->item_number}}  ">
                          <div OnClick="location.href ='/' " style="cursor:pointer;" >
                            <img id="itmg" src="/img/item/{{$value->item_picture}}" alt="">
                            <div class="whghltn">
                              <img src="/img/eye.png/" width="16" height="16" alt="상품 조회수">
                              조회수:{{$value->visit_count}}
                            </div>
                          </div><br>
                          <a href="#">상품이름:{{$value->item_name}}</a><br>
                          <a href="#">상품가격 : {{number_format($value->item_startprice)}}원 </a>
                        </a>
                      </div>
                    @endif
                  @endif
                @endforeach
              </div>
              <div class="item_list">
                <div class="list_hd">
                  <h2 id="Elec_products">가전제품 <a href="/manclothing?id=가전제품">전체보기</a></h2>
                </div>
                @foreach ($catek as $key => $value)
                  @if($key < 10)
                    @if ($value->item_success==1)
                      <div class="item">
                        <a href="/product-detail/{{$value->item_number}}  ">
                          <div OnClick="location.href ='/' " style="cursor:pointer;" >
                            <img id="itmg" src="/img/item/{{$value->item_picture}}" alt="">
                            <div class="whghltn">
                              <img src="/img/eye.png/" width="16" height="16" alt="상품 조회수">
                              조회수:{{$value->visit_count}}
                            </div>
                          </div><br>
                          <a href="#">상품이름:{{$value->item_name}}</a><br>
                          <a href="#">상품가격 : {{number_format($value->item_startprice)}}원 </a>
                        </a>
                      </div>
                    @endif
                  @endif
                @endforeach
              </div>
              <div class="item_list">
                <div class="list_hd">
                  <h2 id="laptop">노트북/PC <a href="/manclothing?id=노트북/PC">전체보기</a></h2>
                </div>
                @foreach ($catel as $key => $value)
                  @if($key < 10)
                    @if ($value->item_success==1)
                      <div class="item">
                        <a href="/product-detail/{{$value->item_number}}  ">
                          <div OnClick="location.href ='/' " style="cursor:pointer;" >
                            <img id="itmg" src="/img/item/{{$value->item_picture}}" alt="">
                            <div class="whghltn">
                              <img src="/img/eye.png/" width="16" height="16" alt="상품 조회수">
                              조회수:{{$value->visit_count}}
                            </div>
                          </div><br>
                          <a href="#">상품이름:{{$value->item_name}}</a><br>
                          <a href="#">상품가격 : {{number_format($value->item_startprice)}}원 </a>
                        </a>
                      </div>
                    @endif
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  var slideIndex = 0; //이미지에 접근하는 인덱스

  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");//slide1에 대한 dom 참조
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; // 처음에 전부 display를 none으로 한다.
    }
    slideIndex++;
    if (slideIndex > slides.length) {
      slideIndex = 1; //인덱스가 초과되면 1로 변경
    }
    slides[slideIndex-1].style.display = "block"; //해당 인덱스는 block으로
    setTimeout(showSlides, 4000); //함수를 4초마다 호출
  }

  </script>



@endsection
