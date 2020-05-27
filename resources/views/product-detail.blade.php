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
              <img class="mySlides" name="" src="/img/product.png" alt=""  val=""/>
              <img class="mySlides" name="" src="/img/iphone.png" />
              <img class="mySlides" name="" src="/img/iphone12.png" alt=""  val=""/>
              <img class="mySlides" name="" src="/img/iphoneSE2.png" alt="" val=""/>
              <img class="mySlides" name="" src="/img/macbookpro.png"  val=""/>
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
                아이패드프로1세대9.7
              </div>
              <div class="time_price">
                <div class="d_price">
                  현재 최고가 :
                </div>
                <div class="d_price_info" name="" val="">
                  280,000
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
                    애플
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_by">
                    구매일 :
                  </div>
                  <div class="by_info tnam" name="">
                    2020-04-21
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_cat">
                    상품 카테고리 :
                  </div>
                  <div class="cat_info tnam" name="">
                    모바일/태블릿
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_opcl">
                    상품 개봉여부 :
                  </div>
                  <div class="opcl_info tnam" name="">
                    개봉
                  </div>
                </div>
                <div class="pd_st">
                  <div class="pd_spric">
                    경매 시작가격 :
                  </div>
                  <div class="spric_info tnam" name="">
                    200,000
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
            <div class="otr_prod_item">
              <img class="otr_prod_item_img" name="" src="/img/product.png" alt="">
            </div>
            <div class="otr_prod_item">
              <img class="otr_prod_item_img" name="" src="/img/product.png" alt="">
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
