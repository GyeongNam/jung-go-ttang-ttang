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
  // var contentString	=
  // '<div>' +
  // '<h2>직거래 위치:</h2>'+
  // '<h3>'+address+'</h3>'+
  // '<p>'+id+'님의. 직거래 위치입니다!</p>' +
  // '</div>';
  //판매자의 아이디
  var id = $('.mapid');
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
        var iwContent =
        '<div style="padding:10px;">'+
        '<h3>직거래 위치: </h3>'+
        '<h3>'+add[i]+'</h3>'+
        '<p>'+id+'님의. 직거래 위치입니다!</p>' +
        '</div>'
        ;
        // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
        console.log(add[i]);
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
</script>
@endsection
@section('content')
@foreach($myproduct as $key => $value)
<input  id="mapid{{$value->item_number}}" class ="mapid" type="hidden"  value="{{$value->seller_id}}">
@endforeach
@foreach($road as $key => $value)
<input  id="maparry{{$value->item_number}}" class ="maparry" type="hidden"  value="{{$value->roadAddress}}">
@endforeach
<div id="map" style="width:auto; height:500px;">
  <div class="wa d">
    <a href="#" class="hi"></a>
  </div>
</div>
@endsection
