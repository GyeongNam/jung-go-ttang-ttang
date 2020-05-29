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
         {{-- <table>
        <tbody>
          <tr>
            <td><a href="#">전체메뉴</a></td>
            <td><a href="#">맨투맨/후드티</a></td>
            <td><a href="#">반팔티셔츠</a></td>
            <td><a href="#">점퍼/야상/패딩</a></td>
            <td><a href="#">셔츠/남방</a></td>
          </tr>
          <tr>
            <td><a href="#?id=남성의류">트레이닝</a></td>
            <td><a href="#">코트</a></td>
            <td><a href="#">가디건</a></td>
            <td><a href="#">청바지</a></td>
            <td><a href="#">반바지</a></td>
          </tr>
          <tr>
            <td><a href="#">니트/스웨터</a></td>
            <td><a href="#">긴팔티셔츠</a></td>
            <td><a href="#">반팔티셔츠</a></td>
            <td><a href="#">언더웨어/속옷</a></td>
            <td><a href="#">조끼/베스트</a></td>
          </tr>
        </tbody>
      </table> --}}
      </div>
    </div>

     <div class="ma_main">
       <div class="m_1">
         <h1>
           <?php
             echo $_GET['id'];
           ?>
           전체보기
         </h1>

       </div>
     </div>
    {{-- @foreach ($# as $key => $value)
    @if ($value -> == $_GET['id']) --}}
     <div class="m_info">
       <div class="m_img">
        <a href="#" class="am_1">
          <div class="su_img">
            <img src="/img/iphone12.png"  alt="" class="s_img1">
          </div>
          <div class="m_name">
          아이폰x
          </div>
          <div class="m_money">
            880,000원
          </div>
        </a>
       </div>
       {{-- @endif
       @endforeach --}}

  </div>
</div>




@endsection
