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
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @endsection
