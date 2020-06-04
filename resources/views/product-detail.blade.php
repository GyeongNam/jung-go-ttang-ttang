@extends('layout.layout_main')

@section('css')
<link rel="stylesheet" href="/css/product-detail.css">
@endsection

@section('js')
<script type="text/javascript">
//변경하는 함수 테스트중 절대 건들지마셈

var slideIndex = 0;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlidess");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slides[slideIndex-1].style.display = "block";
}

// $('#del_detailpage').click(function(){
//   alert("정말 경매를 삭제하시겠습니까? 삭제된 경매는 되돌릴 수 없습니다!");
// })
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
            <div class="mySlidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_picture}}" alt=""  val=""/>
            </div>
            <div class="mySlidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_pictureup}}" alt=""  val=""/>
            </div>
            <div class="mySlidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_pictureback}}" alt=""  val=""/>
            </div>
            <div class="mySlidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_picturedown}}" alt=""  val=""/>
            </div>
            <div class="myslidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_picturefront}}" alt=""  val=""/>
            </div>
            <div class="myslidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_pictureleft}}" alt=""  val=""/>
            </div>
            <div class="myslidess fade">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[0]->item_pictureright}}" alt=""  val=""/>
            </div>

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
                  {{$myproduct[0]->item_startprice}}
                  <span>원</span>
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
                    2427621
                  </div>
                </div>
                <div class="time isk">
                  <img src="/img/clock.png/" width="16" height="16" alt="업로드된시간">
                  <div class="time_num intf" name="">
                    54분 전
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
                    {{$myproduct[0]->item_open}}
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_spric">
                    경매 시작가격 :
                  </div>
                  <div class="spric_info tnam" name="">
                    {{$myproduct[0]->item_startprice}}
                    <span>원</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bt_box">
            <div class="bt-Wla">
              <div class="Wla_click">
                <button class="unWla" type="button" name="button">
                  <img src="/img/b_heart.png" alt="찜 아이콘" width="16" height="16">
                  <span>찜</span>
                  <span>72</span>
                </button>
              </div>
              <div class="Wla">
                <!--<img src="/img/r_heart.png" alt="찜 아이콘" width="16" height="16">
                <span class="click_Wlaact"> 찜목록에 추가되었습니다!</span>-->
              </div>
            </div>
            <button class="ckadu" type="button" name="rudaockadu">경매참여</button>
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
        </div>
        <div class="seller_other_product">
          <div class="otr_prod_box">
            <div class="otr_prod_item_label">
              <span>판매자가 경매중인 물품</span>
            </div>
            <div class="otr_prod_item" cursor:pointer; onclick="localhost/">
              <img class="otr_prod_item_img" name="" src="/img/product.png" alt="">
              <div class="otr_prod_item_np">
                <span class="otr_name" name="">아이폰11pro</span><br>
                <span class="otr_price" name="">현재가격 : 600,000</span>
              </div>
            </div>
            <div class="otr_prod_item" cursor:pointer; onclick="localhost/">
              <img class="otr_prod_item_img" name="" src="/img/product.png" alt="">
              <div class="otr_prod_item_np">
                <span class="otr_name" name="">갤럭시노트10+</span><br>
                <span class="otr_price" name="">현재가격 : 520,000</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="other_item_list">
      <div class="tem_box">
        <div class="other_item_name">
          <div class="label">연관상품</div>
        </div>
        <div class="other_item">
          <div class="otitm">
            <img src="/img/product.png" alt="" width="150" height="150">
          </div>
          <div class="otitm">
            <img src="/img/product.png" alt="" width="150" height="150">
          </div>
          <div class="otitm">
            <img src="/img/product.png" alt="" width="150" height="150">
          </div>
          <div class="otitm">
            <img src="/img/product.png" alt="" width="150" height="150">
          </div>
          <div class="otitm">
            <img src="/img/product.png" alt="" width="150" height="150">
          </div>
        </div>
      </div>
    </div>
    <div class="detail_info_typing">
      <div class="info_typing">
        <button class="typing btdg" type="button" name="button">상품정보</button>
        <button class="comment btdg" type="button" name="button">댓글달기</button>
      </div>
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
          <div class="location_deal">
            <div class="locat">
              <img src="" alt="">
              거래지역
            </div>
            <div class="locate_dnlcl">
              <span>전국</span>
            </div>
          </div>
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
      </div>
    </div>
    <div class="btn_cl">
      <div class="auction_revise">
        <button type="button" name="button" onclick="location.href='product-Modify'">경매 수정</button>
      </div>
      <div class="auction_del">
        <button id="del_detailpage" type="button" name="button" >경매 삭제</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
//경매 삭제 버튼(제발 제에발 건들지 말아주세요)
 $('#del_detailpage').click(function(){
   if(confirm("경매를 삭제 하시겠습니까? 삭제된 경매는 낙찰 받을 수 없습니다!") == true){
       alert("삭제되었습니다.");
   }
  else{
    return false;
  }
 });
</script>
@endsection
