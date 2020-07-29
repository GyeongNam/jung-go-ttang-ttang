
@extends('layout.layout_main')

@section('css')
  <link rel="stylesheet" href="/css/product.css">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />
@endsection
@section('js')
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <!-- 에디터CDN -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>


  {{-- 도로명주소 API --}}
  <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
  <script src='https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js'></script>
  <script>
  //본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다.
  function sample4_execDaumPostcode() {
    new daum.Postcode({
      oncomplete: function(data) {
        // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

        // 도로명 주소의 노출 규칙에 따라 주소를 조합한다.
        // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
        var fullRoadAddr = data.roadAddress; // 도로명 주소 변수
        var extraRoadAddr = ''; // 도로명 조합형 주소 변수

        // 법정동명이 있을 경우 추가한다. (법정리는 제외)
        // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
        if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
          extraRoadAddr += data.bname;
        }
        // 건물명이 있고, 공동주택일 경우 추가한다.
        if(data.buildingName !== '' && data.apartment === 'Y'){
          extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
        }
        // 도로명, 지번 조합형 주소가 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
        if(extraRoadAddr !== ''){
          extraRoadAddr = ' (' + extraRoadAddr + ')';
        }
        // 도로명, 지번 주소의 유무에 따라 해당 조합형 주소를 추가한다.
        if(fullRoadAddr !== ''){
          fullRoadAddr += extraRoadAddr;
        }

        // 우편번호와 주소 정보를 해당 필드에 넣는다.
        document.getElementById('sample4_postcode').value = data.zonecode; //5자리 새우편번호 사용
        document.getElementById('sample4_roadAddress').value = fullRoadAddr;
        document.getElementById('sample4_jibunAddress').value = data.jibunAddress;

        // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
        if(data.autoRoadAddress) {
          //예상되는 도로명 주소에 조합형 주소를 추가한다.
          var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
          document.getElementById('guide').innerHTML = '(예상 도로명 주소 : ' + expRoadAddr + ')';

        } else if(data.autoJibunAddress) {
          var expJibunAddr = data.autoJibunAddress;
          document.getElementById('guide').innerHTML = '(예상 지번 주소 : ' + expJibunAddr + ')';

        } else {
          document.getElementById('guide').innerHTML = '';
        }
      }
    }).open();
  }
  </script>
  {{-- 도로명주소 API --}}

  <script>

  //거래 시작가 확인검사
  function chackprice(){
    var price = $("#price").val();
    var num = price.search(/[0-9]/g);
    var s_reprice1 = $('#s_reprice1');
    if (num < 0){
      s_reprice1.text("값을 입력하세요");
      $("#su_btn").attr("disabled", true);
    }
    else if (price < 500 ) {
      s_reprice1.text("500원 이상 입력해주세요");
      $("#su_btn").attr("disabled", true);
    }
    else {
      s_reprice1.text("");
      $("#su_btn").attr("disabled", false);

    }
  }
</script>
<script type="text/javascript">
function previewImage(f, divid){

  var file = f.files;
  console.log(divid);
  // file[0].size 는 파일 용량 정보입니다.
  if(file[0].size > 1024 * 1024 * 2){
    // 용량 초과시 경고후 해당 파일의 용량도 보여줌
    alert('2MB 이하 파일만 등록할 수 있습니다.\n\n' + '현재파일 용량 : ' + (Math.round(file[0].size / 1024 / 1024 * 100) / 100) + 'MB');

    f.outerHTML = f.outerHTML;

    document.getElementById(divid).innerHTML = '';
  }
  // 확장자 체크
  else if(!/\.(gif|jpg|jpeg|png)$/i.test(file[0].name)){ //파일확장자 제한 정규식
    alert('gif, jpg, png 파일만 선택해 주세요.\n\n현재 파일 : ' + file[0].name); //정규식에 없는 파일명이 선택될 경우 경고창 띄워짐

    // 선택한 파일 초기화
    f.outerHTML = f.outerHTML;
    document.getElementById(divid).innerHTML = '';

  }
  else {
    // FileReader 객체 사용
    var reader = new FileReader();
    // 파일 읽기가 완료되었을때 실행
    //FileReader 웹 애플리케이션이 비동기적으로 데이터를 읽기 위하여 읽을 파일을 가리키는
    //File 혹은 Blob 객체를 이용해 파일의 내용을(혹은 raw data버퍼로) 읽고 사용자의
    //컴퓨터에 저장하는 것을 가능하게 해줍니다.
    reader.onload = function(rst){
      //   if() {
      document.getElementById(divid).innerHTML = '<img src="' + rst.target.result + '">';
      //   }
      //
    }
    // 파일을 읽는다
    reader.readAsDataURL(file[0]);
  }


}
$(function() {
  $("#datepicker").datepicker({dateFormat: 'yy-mm-dd' , minDate: 0});
});
</script>
@endsection
@section('content')
  <div class="">
    <form class="" action="{{url('/product')}}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="contents">
        <div class="product_header">
          <h1>경매물품 등록 <span ><strong>*필수항목</strong></span></h1>
        </div>

        <ul>
          <li>
            <div class="p_list">
              <div class="n_lab">
                <span><strong>*</strong></span>상품이름
              </div>
              <div class="p_info">
                <input class="p_name input" type="text" name="product_name"  placeholder="상품명은 필수입력입니다!" required>
              </div>

            </div>
          </li>

          <li>
            <div class="p_list">
              <div class="n_lab">
                제조사
              </div>
              <div class="p_info">
                <input class="p_maker input" type="text" name="product_maker"  placeholder="(선택 입력)">
              </div>
            </div>
          </li>
          <li>
            <div class="p_list">
              <div class="n_lab">
                구매일
              </div>
              <div class="p_info">
                <input class="p_buyday" type="date" name="product_buy">
              </div>
            </div>
          </li>
          <li>
            <div class="p_list">
              <div class="n_lab">
                <span><strong>*</strong></span>상품 카테고리
              </div>
              <div class="p_info">
                <select class="p_category" name="product_category" required>
                  <option value="">선택하세요</option>
                  <option value="남성의류">남성의류</option>
                  <option value="여성의류">여성의류</option>
                  <option value="패션잡화">패션잡화</option>
                  <option value="뷰티미용">뷰티미용</option>
                  <option value="유아용/출산">유아용/출산</option>
                  <option value="모바일/태블릿">모바일/태블릿</option>
                  <option value="가전제품">가전제품</option>
                  <option value="노트북/데스크탑">노트북/데스크탑</option>
                  <option value="카메라/캠코더">카메라/캠코더</option>
                  <option value="가구/인테리어">가구/인테리어</option>
                  <option value="리빙/생활">리빙/생활</option>
                  <option value="도서/음반/문구">도서/음반/문구</option>
                  <option value="티켓/쿠폰">티켓/쿠폰</option>
                  <option value="스포츠">스포츠</option>
                </select>
              </div>
            </div>
          </li>
          <li>
            <div class="p_list">
              <div class="n_lab">
                상품 개봉여부
              </div>
              <div class="p_info" name="open">
                <select class="ss" name="select_state">
                  <option value=1>개봉</option>
                  <option value="0">미개봉</option>
                </select>


              </div>
            </div>
          </li>
          <li>
            <div class="p_list">
              <div class="n_lab">
                <span><strong>*</strong></span>경매 마감일자
              </div>
              <div class="p_info">
                <input id="datepicker" class="p_last_day" type="text" name="Auction_last_time" value=""  required>
              </div>
            </div>
          </li>
          <li>
            <div class="p_list">
              <div class="n_lab">
                <span><strong>*</strong></span>경매 시작가
              </div>
              <div class="p_info">
                <input class="p_startprice input" type="number" name="Auction_start" id="price" onKeyup="chackprice()" placeholder="경매 시작가 최소 가격은 500원 부터 입니다!" required>
                <p id="s_reprice1"></p>
              </div>
            </div>
            <div class="p_list">
              <div class="n_lab">
                <span><strong>*</strong></span>직거래 주소 입력
              </div>
              <div class="p_info">
                <input class="juso" type="text" id="sample4_postcode" name="sample4_postcode" placeholder="우편번호">
                <input type="button" id="sample4_doro" name="sample4_doro" onclick="sample4_execDaumPostcode()" value="우편번호 찾기"><br>
                <input class="juso" type="text" id="sample4_roadAddress" name="sample4_roadAddress" placeholder="도로명주소"><br>
                <input class="juso" type="text" id="sample4_jibunAddress" name="sample4_jibunAddress" placeholder="지번주소"><br>
                <input class="juso" type="text" id="sample4_Address_detail" name="sample4_doro_detail" placeholder="상세주소 입력">
                <span id="guide" style="color:#999"></span>
              </div>
            </div>
          </li>
          <div class="fileuplode">
            <ul class="sc-image">
              <li class="li-box">
                <div class="p_list">
                  <div class="n_lab">
                    <span><strong>*</strong></span>사진등록
                  </div>
                  <div class="p_info">
                    <div class="p_picture input">
                      <div class="inp_img">
                        <div class="inp_img_lab">
                          <p>썸네일 이미지</p>
                        </div>
                        <div class="thumbnail_img">
                          <input type="file" name="item_picture" id="imageup" accept="image/*" onchange="previewImage(this, 'preview');" required/>
                          <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                        </div>
                        <div class="pre0" id="preview"></div>
                      </div>
                      <div class="inp_img">
                        <div class="inp_img_lab">
                          전면사진
                        </div>
                        <div class="froint_img">
                          <input type="file" name="item_picturefront" id="imageup" accept="image/*" onchange="previewImage(this, 'preview1');"/>
                          <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                          <div class="pre0" id="preview1"></div>
                        </div>
                      </div>
                      <div class="inp_img">
                        <div class="inp_img_lab">
                          후면사진
                        </div>
                        <div class="back_img">
                          <input type="file" name="item_pictureback" id="imageup" accept="image/*" onchange="previewImage(this, 'preview2');"/>
                          <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                          <div class="pre2" id="preview2"></div>
                        </div>
                      </div>
                      <div class="inp_img">
                        <div class="inp_img_lab">
                          왼쪽 측면
                        </div>
                        <div class="l_img">
                          <input type="file" name="item_pictureleft" id="imageup" accept="image/*" onchange="previewImage(this, 'lpreview');"/>
                          <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                          <div class="pre3" id="lpreview"></div>
                        </div>
                      </div>
                      <div class="inp_img">
                        <div class="inp_img_lab">
                          오른쪽 측면
                        </div>
                        <div class="r_img">
                          <input type="file" name="item_picturerigth" id="imageup" accept="image/*" onchange="previewImage(this, 'rpreview');"/>
                          <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                          <div class="pre4" id="rpreview"></div>
                        </div>
                      </div>
                      <div class="inp_img">
                        <div class="inp_img_lab">
                          상단 측면
                        </div>
                        <div class="t_img">
                          <input type="file" name="item_pictureup" id="imageup" accept="image/*" onchange="previewImage(this, 'tpreview');"/>
                          <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                          <div class="pre5" id="tpreview"></div>
                        </div>
                      </div>
                      <div class="inp_img">
                        <div class="inp_img_lab">
                          하단 측면
                        </div>
                        <div class="b_img">
                          <input type="file" name="item_picturebehind" id="imageup" accept="image/*" onchange="previewImage(this, 'bupreview');"/>
                          <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                          <div class="pre6" id="bupreview"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="p_list">
                <div class="n_lab">
                  <span></span>상품설명
                </div>
                <div class="p_info">
                  <textarea class="deplarea"  id="dpelxj" name="item_info"></textarea>
                </div>
              </div>
            </li>
          </ul>
        </ul>
        <div class="complete_btn">
          <button type="submit" id="su_btn" name="button" onclick="return to submit();">등록하기</button>
        </div>
      </div>
      <div class="s_left">

      </div>
      <div class="s_right">

      </div>
    </form>
  </div>
  {{-- <script>
  // 3. CKEditor5를 생성할 textarea 지정
  ClassicEditor
  .create( document.querySelector( '#dpelxj' ) )
  .catch( error => {
  console.error( error );
} );
</script> --}}
@endsection
