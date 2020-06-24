@extends('layout.layout_main')

@section('title')
  중고땅땅-남성의류
@endsection

@section('css')
<link rel="stylesheet" href ="/css/manclothing.css"/>
@endsection

@section('js')




@endsection

@section('content')

  <div class="mc_layout">
    <div class="mc_header">
      <form class="form1"  action=""  method="get" >
      <div class="mc_main">
        <input type="hidden" name="id" value="{{$_GET['id']}}">
        <input type="text" name="search" class="it_sea" placeholder="상품명검색">
        <button type="submit" class="sea_ck"><i class="fas fa-search"></i></button>
      </div>
      </form>
    </div>
    <hr class="mc_main_line">
    <div class="it_cago">
      <div class="ite_menu">
      </div>
    </div>

    {{-- 검색어가 있는 경우에만 > 돌아가기 < 보임 --}}
    @if (isset($_GET['search']))
      <div class="">
        <a href="?id={{$_GET['id']}}">돌아가기</a>
      </div>
    @endif

     <div class="ma_main">
       <div class="m_1">
         <h1>
           @if($search)
           '{{$search}}' 의 검색 결과
          @else
            <?php echo $_GET['id'];?>
            전체보기
          @endif

         </h1>

       </div>
     </div>

<div class="m_layout">
    @foreach ($cate as $key => $value)
    @if ($cateF > 0)

     <div class="m_info">
       <div class="m_img">
           <button type="type="class="de_but" submit"" name="button">
              <a href="/product-detail/{{$value->item_number}}"><img src="/img/item/{{$value->item_picture}}" alt="상품사진" name="#" class="ite_img"></a>
           </button>
          <div class="m_name">
          {{$value->item_name}}
          </div>
          <div class="m_money">
            시작가: {{ number_format($value->item_startprice)}}원
          </div>
          <div class="m_money">
            현재가: {{ number_format($value->item_startprice)}}원
          </div>
        </a>
       </div>
       </div>

       @endif
       @endforeach
</div>

</div>





@endsection
