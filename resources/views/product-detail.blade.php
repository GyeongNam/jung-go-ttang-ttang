@extends('layout.layout_main')

@section('css')
<link rel="stylesheet" href="/css/product-detail.css">
@endsection

@section('js')

@endsection
@section('content')
<div class="content">
  <div class="detail_page">
    <div class="detail_head">
      <div class="pr_deta_pic">
        <div class="detailimg_list">
          <div id="sliderFrame">
            <div id="slider">
              <img class="mySlides" name="" src="/img/item/{{$myproduct[2]->item_picture}}" alt=""  val=""/>
              <img class="mySlides" name="" src="/img/item/{{$myproduct[2]->item_pictureup}}" alt=""  val=""/>
              <img class="mySlides" name="" src="/img/item/{{$myproduct[2]->item_pictureback}}" alt=""  val=""/>
              <img class="mySlides" name="" src="/img/item/{{$myproduct[2]->item_picturedown}}" alt=""  val=""/>
              <img class="mySlides" name="" src="/img/item/{{$myproduct[2]->item_picturefront}}" alt=""  val=""/>
              <img class="mySlides" name="" src="/img/item/{{$myproduct[2]->item_pictureleft}}" alt=""  val=""/>
              <img class="mySlides" name="" src="/img/item/{{$myproduct[2]->item_pictureright}}" alt=""  val=""/>
            </div>
            <a class="btn-floating-left" onclick="plusDivs(-1)">&#10094;</a>
            <a class="btn-floating-right" onclick="plusDivs(+1)">&#10095;</a>
          </div>

        </div>
      </div>
      <div class="detail_product_info">
        <div class="dpbox">
          <div class="d_info">
            <div class="tit_pri">
              <div class="d_title">
                {{$myproduct[4]->item_name}}
              </div>
              <div class="time_price">
                <div class="d_price">
                  현재 최고가 :
                </div>
                <div class="d_price_info" name="" val="">
                  {{$myproduct[4]->item_startprice}}
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
                    {{$myproduct[4]->item_maker}}
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_by">
                    구매일 :
                  </div>
                  <div class="by_info tnam" name="">
                    {{$myproduct[4]->item_buy}}
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_cat">
                    상품 카테고리 :
                  </div>
                  <div class="cat_info tnam" name="">
                    {{$myproduct[4]->item_category}}
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_opcl">
                    상품 개봉여부 :
                  </div>
                  <div class="opcl_info tnam" name="">
                    {{$myproduct[4]->item_open}}
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_spric">
                    경매 시작가격 :
                  </div>
                  <div class="spric_info tnam" name="">
                    {{$myproduct[4]->item_startprice}}
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
                  <img class="seller_img" name="" src="/img/dadang.jpg" alt="">
                  <a class="seller_name_link" name="" href="#">junsik</a>
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
              {{$myproduct[4]->item_info}}
            </div>
          </div>
        </div>
        <div class="tkdvnaansdml">

        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">



var slideIndex = 0;  /*slideIndex 로 설정 */
showDivs(slideIndex); /* 첫번째 이미지를 표시하기 위해 showDivs 호출 */

/*$(document).ready(function(){
  showDivs(slideIndex += n);
});*/

function plusDivs(n) { /* slideIndex에 하나를 추가한다. */
  showDivs(slideIndex += n);
}

function showDivs(n) {

  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";

}

</script>
@endsection
