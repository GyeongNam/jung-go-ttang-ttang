@extends('layout.layout_main')

@section('css')
<link rel="stylesheet" href="/css/mylocatino.css">
@endsection

@section('js')
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8a82332350bc18d282d500e361ee79da&libraries=services"></script>
<script>
// console.log(a);
$(document).ready(function(){

  var mapContainer = document.getElementById('map'), // 지도를 표시할 div
  mapOption = {
    center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
    level: 5 // 지도의 확대 레벨
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
  // HTML5의 geolocation으로 사용할 수 있는지 확인합니다
  if (navigator.geolocation) {

    // GeoLocation을 이용해서 접속 위치를 얻어옵니다
    navigator.geolocation.getCurrentPosition(function(position) {

      var lat = position.coords.latitude, // 위도
      lon = position.coords.longitude; // 경도

      var locPosition = new kakao.maps.LatLng(lat, lon), // 마커가 표시될 위치를 geolocation으로 얻어온 좌표로 생성합니다
      message = '<div style="padding:5px;">현재 사용자의 위치입니다?!</div>'; // 인포윈도우에 표시될 내용입니다

      // 마커와 인포윈도우를 표시합니다
      displayMarker(locPosition, message);
      // 지도에 표시할 원을 생성합니다
      var circle = new kakao.maps.Circle({
        center :locPosition,  // 원의 중심좌표 입니다
        radius: 1000, // 미터 단위의 원의 반지름입니다
        strokeWeight: 5, // 선의 두께입니다
        strokeColor: '#75B8FA', // 선의 색깔입니다
        strokeOpacity: 1, // 선의 불투명도 입니다 1에서 0 사이의 값이며 0에 가까울수록 투명합니다
        strokeStyle: 'dashed', // 선의 스타일 입니다
        fillColor: '#CFE7FF', // 채우기 색깔입니다
        fillOpacity: 0.7  // 채우기 불투명도 입니다
      });

      // 지도에 원을 표시합니다
      circle.setMap(map);
    });

  } else { // HTML5의 GeoLocation을 사용할 수 없을때 마커 표시 위치와 인포윈도우 내용을 설정합니다

    var locPosition = new kakao.maps.LatLng(33.450701, 126.570667),
    message = 'geolocation을 사용할수 없어요..'

    displayMarker(locPosition, message);
  }

  // 지도에 마커와 인포윈도우를 표시하는 함수입니다
  function displayMarker(locPosition, message) {

    // 마커를 생성합니다
    var marker = new kakao.maps.Marker({
      map: map,
      position: locPosition
    });

    var iwContent = message, // 인포윈도우에 표시할 내용
    iwRemoveable = true;

    // 인포윈도우를 생성합니다
    var infowindow = new kakao.maps.InfoWindow({
      content : iwContent,
      removable : iwRemoveable
    });

    // 인포윈도우를 마커위에 표시합니다
    infowindow.open(map, marker);

    // 지도 중심좌표를 접속위치로 변경합니다
    map.setCenter(locPosition);
  }
  // 주소-좌표 변환 객체를 생성합니다
  var geocoder = new kakao.maps.services.Geocoder();
  // var contentString	=
  // '<div>' +
  // '<h2>직거래 위치:</h2>'+
  // '<h3>'+address+'</h3>'+
  // '<p>'+id+'님의. 직거래 위치입니다!</p>' +
  // '</div>';
  //판매자의 아이디
  var mapname = $('.mapname');
  var mapid = $('.mapip');
  var positions = $('.maparry');
  var mappicture = $('.mappicture');
  var mapstartprice = $('.mapstartprice')
  var mapproduct = $('.mapproduct');
  var rodcount = {{count($road)}};
  // console.log(id);
  var add = [];
  var id = [];
  var name = [];
  var picture = [];
  var startprice = [];
  var product = [];
  var makers = [];

  for (i = 0; i < mapproduct.length; i++) {
    product.push(mapproduct[i].value);
  }
  // for (i = 0; i < maker.length; i++) {
  //   makers.push(maker[i].value);
  // }
  for (i = 0; i < mapstartprice.length; i++) {
    startprice.push(mapstartprice[i].value);
  }
  for (i = 0; i < mappicture.length; i++) {
    picture.push(mappicture[i].value);
  }
  console.log(picture);
  for (i = 0; i < mapname.length; i++) {
    name.push(mapname[i].value);
  }
  for (i = 0; i < mapid.length; i++) {
    id.push(mapid[i].value);
  }
  for(i=0; i<positions.length;i++){
    add.push(positions[i].value);
  }
  // console.log(add);
  // 주소로 좌표를 검색합니다
  // // 원(Circle)의 옵션으로 넣어준 반지름
  // var radius = 500;
  // markers.forEach(function(positions) {
  //   var c1 = map.getCenter(locPosition);
  //   var c2 = positions.getPosition();
  //   console.log(c1);
  //   var poly = new Polyline({
  //     // map: map, 을 하지 않아도 거리는 구할 수 있다.
  //     path: [c1, c2]
  //   });
  //   var dist = poly.getLength(); // m 단위로 리턴
  //
  //   if (dist < radius) {
  //     positions.setMap(map);
  //   } else {
  //     positions.setMap(null);
  //   }
  // });
  for(let i=0; i <add.length; i++){
    // console.log(add[i]);
    geocoder.addressSearch(add[i], function(result, status) {

      // 정상적으로 검색이 완료됐으면
      if (status === kakao.maps.services.Status.OK) {

        var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

        // 결과값으로 받은 위치를 마커로 표시합니다
        var marker = new kakao.maps.Marker({
          map: map,
          position: coords
        });
        // markers.push(marker);

        var link = mapproduct[i];
        var fuck = picture[i];
        console.log(fuck);
        // 마커에 커서가 오버됐을 때 마커 위에 표시할 인포윈도우를 생성합니다
        // iwRemoveable = true; // removeable 속성을 ture 로 설정하면 인포윈도우를 닫을 수 있는 x버튼이 표시됩니다
        var iwContent =
        '<div class="wrap">' +
        '    <div class="info">' +
        '        <div class="title">' + name[i] +
        '          <div class="close" onclick="closeOverlay()" title="닫기"></div>' +
        '        </div>'+
        '        <div class="body">' +
        '            <div class="img">' +
        '                  <img src="/img/item/'+fuck+'" width="73" height="70">' +
        '            </div>' +
        '            <div class="desc">' +
        '                <div class="ellipsis">'+ add[i]+'</div>' +
        '                <div class="jibun ellipsis">판매자 :'+ id[i] +'</div>' +
        '                <div class="stapri">경매 시작가격 : ' + startprice[i] + '</div>'+
        '                <div><a href="/product-detail/'+product[i]+'" target="_self" class="link">상품 바로가기</a></div>' +
        '            </div>' +
        '        </div>' +
        '    </div>' +
        '</div>', // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
        iwRemoveable = true;

        // 인포윈도우를 생성합니다
        var infowindow = new kakao.maps.InfoWindow({
          content : iwContent,
          removable : iwRemoveable
        });

        // 마커에 클릭이벤트를 등록합니다
        kakao.maps.event.addListener(marker, 'click', function() {
          // 마커 위에 인포윈도우를 표시합니다
          infowindow.open(map, marker);
        });
        // // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
        // map.setCenter(coords);
      }
    });
  }
});
</script>
@endsection
@section('content')

@foreach($myproduct as $key => $value)
<input  id="mapproduct{{$value->item_number}}" class ="mapproduct" type="hidden"  value="{{$value->item_number}}">
@endforeach
@foreach($myproduct as $key => $value)
<input  id="mapstartprice{{$value->item_number}}" class ="mapstartprice" type="hidden"  value="{{$value->item_startprice}}">
@endforeach
@foreach($myproduct as $key => $value)
<input  id="mappicture{{$value->item_number}}" class ="mappicture" type="hidden"  value="{{$value->item_picture}}">
@endforeach
@foreach($myproduct as $key => $value)
<input  id="mapname{{$value->item_number}}" class ="mapname" type="hidden"  value="{{$value->item_name}}">
@endforeach
@foreach($myproduct as $key => $value)
<input  id="mapip{{$value->item_number}}" class ="mapip" type="hidden"  value="{{$value->seller_id}}">
@endforeach
@foreach($road as $key => $value)
<input  id="maparry{{$value->item_number}}" class ="maparry" type="hidden"  value="{{$value->roadAddress}}">
@endforeach
<div id="map" style="width:auto; height:500px;">
  <div class="wa d">
    <a href="#" class="hi"></a>
  </div>
</div>
<div class="jidosul">
  <p>웹에서는 사용자의 정확한 위치가 나오지 않을 수 있습니다...!</p>
  <p>이점 참고해주세요!!</p>
</div>
@endsection
