@extends('layout.layout_main')

@section('css')
  <!-- <link rel="stylesheet" href="/css/qnacss.css"> -->
@endsection

@section('js')

@endsection
@section('content')
<form class="" action="{{url('/qna_modifyupdate')}}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="upup" value="{{$sending}}">
<div class="qnainput" >
  <div class="">
    <div class="">

      <div class="">
        비밀번호 : <input type="text" class="dadada" name="qnapass" value="">
      </div>
    </div>
    <div >
    <label>제목</label>
    <input type="text" name="qnatitle" value="">
  </div>
    <label>문의내용</label>
  </div>
  <textarea name="qnatext" class="but1" rows="8" cols="80"></textarea>
  <button type="submit" class="but" name="button" onclick="add_div();">작성하기</button>
</div>
</form>
@endsection
