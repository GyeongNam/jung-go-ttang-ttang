@extends('layout.layout_main')

@section('css')
  <link rel="stylesheet" href="/css/product-detail.css">
@endsection

@section('js')
  <script type="text/javascript">
  function toggleImg() {
    var likhet = document.getElementById('likep');
    // if(session('login_ID') == false){
    //     alert("로그인부터 하세요");
    //     url=/Login;
    // }
    if(likhet.src.match("heart")) {
      likhet.src="/img/b_gkxm.png";
      alert("관심항목에 추가되었습니다.");

    }
    else if(likhet.src.match("b_gkxm")) {
      likhet.src="/img/heart.png";
      alert("관심항목에서 헤제되었습니다.");
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
    console.log(slides.length);
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
<script type="text/ajax">
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
        likhet.src="/img/b_gkxm.png";
        alert("관심항목에 추가되었습니다.");

      }
      else if(likhet.src.match("b_gkxm")) {
        likhet.src="/img/heart.png";
        alert("관심항목에서 헤제되었습니다.");
      }

    }
  });

}
else if(likhet.src.match("b_gkxm")) {
  likhet.src="/img/heart.png";
  alert("관심항목에서 헤제되었습니다.");
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
                      6492
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
                      <p class="sub" >{{date(strtotime($myproduct[0]->Created_at))}}</p>
                          {{-- <p class="sub">{{date('F d,', strtotime($myproduct[0]->Created_at)) }}
                             {{date('g:ia', strtotime($myproduct[0]->Created_at)) }}</p> --}}
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
                        <img id="likep" src="/img/heart.png" alt="찜 아이콘" width="16" height="16">
                        <span>찜</span>
                        <span>72</span>
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
              <div class="combox">
                <textarea class="comment_text" name="name" rows="8" cols="80"></textarea>
                <button type="button" class="comment_dunglok" name="button">댓글달기</button>
              </div>
            </div>
          </div>
        </div>
        <div class="btn_cl">
          @if(decrypt(session()->get('login_ID')) == $myproduct[0]->seller_id)
          <div class="auction_revise">
            <form class="" action="{{url('/product-Modify')}}" method="get">
              <input type="hidden" name="item_key" value="{{$myproduct[0]->item_number}}">
              <button type="submit" name="button">경매 수정</button>
            </form>
          </div>
          <div class="auction_del">
            <a href="/item_remove/{{$myproduct[0]->item_number}}/{{$id}}">
            <button id="del_detailpage" type="button" name="button" >경매 삭제</button>
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
    <script type="text/javascript">
    //경매 삭제 버튼(제발 제에발 건들지 말아주세요)
    // $('#del_detailpage').click(function(){
    //   if(confirm("경매를 삭제 하시겠습니까? 삭제된 경매는 낙찰 받을 수 없습니다!") == true){
    //     alert("삭제되었습니다.");
    //   }
    //   else{
    //     return false;
    //   }
    // });
  </script>
@endsection
