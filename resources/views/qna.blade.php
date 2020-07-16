@extends('layout.layout_main')

@section('css')
  <link rel="stylesheet" href="/css/qnacss.css">
@endsection

@section('js')

@endsection
@section('content')
  <div class="anrdma">
    <h1 class="Qtitle">나의 Q&A</h1>
    <div class="allcls">
      <div class="servicecenter">
        <div class="content">
          <div class="content-dis">
            <div class="content-dis">
              <table id="qnat">
                <thead>
                  <tr>
                    <th scope="row">제목</th>
                    <td>{{$qnat[0]->qna_title}}</td>
                  </tr>
                  <tr>
                    <th scope="row">작성자</th>
                    <td>{{$qnat[0]->qna_id}} </td>
                  </tr>
                  <tr class="date-wrap">
                    <th scope="row">작성일</th>
                    <td>{{$qnat[0]->created_at}}</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="2">
                    <div class="detail_text">
                      {{$qnat[0]->qna_text}}
                    </div>
                    <button class="qnadel" type="button" name="button">삭제하기</button>
                    <button class="qnamody" type="button" name="button">수정하기</button>
                    <button class="qnalist" type="button" name="button" onClick="location.href='/Servicecenter'">목록으로</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @endsection
