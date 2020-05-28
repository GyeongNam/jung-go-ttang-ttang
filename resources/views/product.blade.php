
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

//이미지 파일 다중 삽입
function setThumbnail(event) {
  for (var image of event.target.files) {
    var reader = new FileReader();
    reader.onload = function(event) {
      //onload(읽기에 성공했을때 실행되는 이벤트 핸들러)
      var img = document.createElement("img"); //이미지 태그 동적 생
      img.setAttribute("src", event.target.result);
      //.setAttribute()는 선택한 요소(element)의 속성(attribute) 값을 정합니다.
      document.querySelector("div#image_container").appendChild(img);
      //.querySelector('selector') 는 CSS선택자로 요소를 선택하게 해줍니다.

    };
    console.log(image); //정보(사진)를 출력
    reader.readAsDataURL(image); // 이미지 파일을 읽는다.
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
                        <input type="file" name="" id="imageup" accept="image/*" onchange="setThumbnail(event);" multiple maxlength="5" required/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법
                             multiple 속성 : 사용자가 두 개 이상의 옵션을 동시에 선택할 수 있음을 명시.-->
                      </div>
                      <div id="image_container"></div>
                    </div>
                    <div class="inp_img">
                      <div class="inp_img_lab">
                        전면사진
                      </div>
                      <div class="froint_img">
                        <input type="file" name="" id="imageup" accept="image/*" onchange="setThumbnail(event);" multiple maxlength="2"/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법
                             multiple 속성 : 사용자가 두 개 이상의 옵션을 동시에 선택할 수 있음을 명시.-->
                        <div id="image_container"></div>
                      </div>
                    </div>
                    <div class="inp_img">
                      <div class="inp_img_lab">
                        후면사진
                      </div>
                      <div class="back_img">
                        <input type="file" name="" id="imageup" accept="image/*" onchange="setThumbnail(event);" multiple maxlength="2"/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법
                             multiple 속성 : 사용자가 두 개 이상의 옵션을 동시에 선택할 수 있음을 명시.-->
                        <div id="image_container"></div>
                      </div>
                    </div>
                    <div class="inp_img">
                      <div class="inp_img_lab">
                       왼쪽 측면
                      </div>
                      <div class="l_img">
                        <input type="file" name="" id="imageup" accept="image/*" onchange="setThumbnail(event);" multiple maxlength="2"/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법
                             multiple 속성 : 사용자가 두 개 이상의 옵션을 동시에 선택할 수 있음을 명시.-->
                        <div id="image_container"></div>
                      </div>
                    </div>
                    <div class="inp_img">
                     <div class="inp_img_lab">
                       오른쪽 측면
                     </div>
                     <div class="r_img">
                       <input type="file" name="" id="imageup" accept="image/*" onchange="setThumbnail(event);" multiple maxlength="2"/>
                       <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법
                            multiple 속성 : 사용자가 두 개 이상의 옵션을 동시에 선택할 수 있음을 명시.-->
                       <div id="image_container"></div>
                     </div>
                    </div>
                    <div class="inp_img">
                      <div class="inp_img_lab">
                        상단 측면
                      </div>
                      <div class="t_img">
                        <input type="file" name="" id="imageup" accept="image/*" onchange="setThumbnail(event);" multiple maxlength="2"/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법
                             multiple 속성 : 사용자가 두 개 이상의 옵션을 동시에 선택할 수 있음을 명시.-->
                        <div id="image_container"></div>
                      </div>
                    </div>
                    <div class="inp_img">
                      <div class="inp_img_lab">
                        하단 측면
                      </div>
                      <div class="b_img">
                        <input type="file" name="" id="imageup" accept="image/*" onchange="setThumbnail(event);" multiple maxlength="2"/>
                        <!-- accept 속성 : 특정 확장자를 지정하거나 미디어 타입을 지정하는 방법
                             multiple 속성 : 사용자가 두 개 이상의 옵션을 동시에 선택할 수 있음을 명시.-->
                        <div id="image_container"></div>
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
                <textarea class="explanation" name="item_info" rows="8" cols="80" placeholder="상품 설명을 입력해주세요."></textarea>
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

@endsection
