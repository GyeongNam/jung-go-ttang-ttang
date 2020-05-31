@extends('layout.layout_main')

@section('css')
<link rel="stylesheet" href="/css/product.css">
@endsection
@section('js')
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
function previewImage(f){

  var file = f.files;
  // file[0].size 는 파일 용량 정보입니다.
  if(file[0].size > 1024 * 1024 * 2){
    // 용량 초과시 경고후 해당 파일의 용량도 보여줌
    alert('2MB 이하 파일만 등록할 수 있습니다.\n\n' + '현재파일 용량 : ' + (Math.round(file[0].size / 1024 / 1024 * 100) / 100) + 'MB');

    f.outerHTML = f.outerHTML;

    document.getElementById('preview').innerHTML = '';
  }
  // 확장자 체크
  if(!/\.(gif|jpg|jpeg|png)$/i.test(file[0].name)){
    alert('gif, jpg, png 파일만 선택해 주세요.\n\n현재 파일 : ' + file[0].name);

    // 선택한 파일 초기화
    f.outerHTML = f.outerHTML;

    document.getElementById('preview').innerHTML = '';

  }
  else {
    // FileReader 객체 사용
    var reader = new FileReader();
    // 파일 읽기가 완료되었을때 실행
    //FileReader 웹 애플리케이션이 비동기적으로 데이터를 읽기 위하여 읽을 파일을 가리키는
    //File 혹은 Blob 객체를 이용해 파일의 내용을(혹은 raw data버퍼로) 읽고 사용자의
    //컴퓨터에 저장하는 것을 가능하게 해줍니다.
    reader.onload = function(rst){
      document.getElementById('preview').innerHTML = '<img src="' + rst.target.result + '">';
    }
    // 파일을 읽는다
    reader.readAsDataURL(file[0]);
  }
}
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
              <input class="p_last_day" type="date" name="Auction_last_time"  min="2000-01-01T00:00" max="2100-12-31T00:00" required>
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
                        <input type="file" name="item_picture" id="imageup" accept="image/*" onchange="previewImage(this);" required/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                      </div>
                      <div class="" id="preview"></div>
                    </div>
                    <div class="inp_img">
                      <div class="inp_img_lab">
                        전면사진
                      </div>
                      <div class="froint_img">
                        <input type="file" name="item_picturefront" id="imageup" accept="image/*" onchange="previewImage(this);"/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                        <div class="" id="preview"></div>
                      </div>
                    </div>
                    <div class="inp_img">
                      <div class="inp_img_lab">
                        후면사진
                      </div>
                      <div class="back_img">
                        <input type="file" name="item_pictureback" id="imageup" accept="image/*" onchange="previewImage(this);"/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                        <div class="" id="preview"></div>
                      </div>
                    </div>
                    <div class="inp_img">
                      <div class="inp_img_lab">
                        왼쪽 측면
                      </div>
                      <div class="l_img">
                        <input type="file" name="item_pictureleft" id="imageup" accept="image/*" onchange="previewImage(this);"/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                        <div class="" id="lpreview"></div>
                      </div>
                    </div>
                    <div class="inp_img">
                      <div class="inp_img_lab">
                        오른쪽 측면
                      </div>
                      <div class="r_img">
                        <input type="file" name="item_picturerigth" id="imageup" accept="image/*" onchange="previewImage(this);"/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                        <div class="" id="rpreview"></div>
                      </div>
                    </div>
                    <div class="inp_img">
                      <div class="inp_img_lab">
                        상단 측면
                      </div>
                      <div class="t_img">
                        <input type="file" name="item_pictureup" id="imageup" accept="image/*" onchange="previewImage(this);"/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                        <div class="" id="tpreview"></div>
                      </div>
                    </div>
                    <div class="inp_img">
                      <div class="inp_img_lab">
                        하단 측면
                      </div>
                      <div class="b_img">
                        <input type="file" name="item_picturebehind" id="imageup" accept="image/*" onchange="previewImage(this);"/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법-->
                        <div class="" id="bupreview"></div>
                      </div>
                    </div>
                    <input type="file" name="files1" accept="image/*" onchange="previewImage(this)" />
                    <div id="preview"></div>
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
                <textarea class="explanation" name="item_info" rows="8" cols="80" placeholder="상품 설명을 입력해주세요."></textarea>
              </div>
            </div>
          </li>
        </ul>
      </ul>
      <div class="complete_btn">
        <button type="submit" id="su_btn" name="button" onclick="return to submit();">수정하기</button>
      </div>
      <div class="complete_btn">
        <button type="submit" id="su_btn" name="button" onclick="return to submit();">삭제하기</button>
      </div>
    </div>
    <div class="s_left">

    </div>
    <div class="s_right">

    </div>
  </form>
</div>

@endsection
