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
      <div class="mc_main">
        <input type="text" name="" class="it_sea" placeholder="상품명검색">
        <button type="button" class="sea_ck"><i class="fas fa-search"></i></button>

      </div>
    </div>
    <hr class="mc_main_line">
    <div class="it_cago">
      <div class="ite_menu">

      </div>
    </div>

     <div class="ma_main">
       <div class="m_1">
         <h1>
           <?php echo $_GET['id'];?>
           전체보기
         </h1>

       </div>
     </div>

<div class="m_layout">
    @foreach ($cate as $key => $value)
    @if ($cateF > 0)

     <div class="m_info">
       <div class="m_img">
        <a href="#" class="am_1">
          <div class="su_img">
            <img src="/img/item/{{$value->item_picture}}"  alt="" class="s_img1">
          </div>
          <div class="m_name">
          {{$value->item_name}}
          </div>
          <div class="m_money">
            {{$value->item_startprice}}
          </div>
        </a>
       </div>
       </div>

       @endif
       @endforeach
</div>

</div>





@endsection
