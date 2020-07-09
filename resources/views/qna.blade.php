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
                    <th width="4%"></th>
                    <th>번호</th>
                    <th>문의내용</th>
                    <th>작성자(ID)</th>
                    <th>작성일</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><div class="arrow"></div></td>
                    <td></td>
                    <td id="qnatext"></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>

                  </tr>
                  <td colspan="2">
                    <div class="detail_text">
                      카카오TV에서 인터넷 방송 활동을 했던 아무무의 본명이다.
                      카카오TV의 전신인 다음 tv팟에서 방송을 시작했다. 다음 tv팟의 인기 PD들이 대거 군 입대나 타 플랫폼으로 이전하면서 생긴 공백을 틈타 도파를 비롯한 롤 방송인들의 게임을 보면서 방송을 시작한 게 그 기원이다. 이후 리그 오브 레전드 천상계 유저나 프로게이머의 게임을 관전하며 중계하는 것을 주력 컨텐츠로 삼으면서 점차 유명세를 얻었고 이른바 '리모컨' PD라는 타이틀도 걸게 된다.
                      자신은 영국 유학을 다녀온 적이 있으며 '톰 클라스'라는 이름[2]의 현지인 친구까지 사귀었다고 주장하지만, 그 증거를 좀처럼 보여주지 않는다. 대충 팟수들은 또 엄준식이 치는 구라겠거니 하며 밈으로 여기는 중. 허풍쟁이 이미지 때문인 것도 있지만, 축구 중계 방송을 할 때 자신은 리버풀 FC의 팬덤인 콥을 자처했지만 자칭 영국 유학파라는 사람이 축구 선수 이름도 제대로 읽지 못하는 모습을 보여주었기 때문이다.
                      위 사진에서도 볼 수 있듯 턱살이 심하게 처져 있으며, 본인도 이를 컴플렉스로 여기는지 방송 시에는 검은색 마스크로 턱을 가린다. 시청자들은 이것을 '턱브라'라고 일컫기도.
                    </div>
                  </td>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    @endsection
