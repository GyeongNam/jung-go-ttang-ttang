@extends('layout.layout_main')

@section('css')
<link rel="stylesheet" href="/css/servicecenter.css">
@endsection

@section('js')
<script type="text/javascript">
function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();



</script>

@endsection
@section('content')
<div class="service_list_page">
  <div class="service_content">
    <div class="service_header">
      <div class="sh">
        <h1 class="headname">공지사항</h1>
      </div>
    </div>
    <div class="service_menu">
      <div class="tabbt">
        <button class="tablink" onclick="openPage('Home', this)">자주하는 질문</button>
        <button class="tablink" onclick="openPage('News', this)" id="defaultOpen">경매/입찰문의</button>
        <button class="tablink" onclick="openPage('Contact', this)">1:1상담</button>
      </div>
      <div id="Home" class="tabcontent">
        <div class="accordionheader">
          <h1>자주하는 질문</h1>
          <p>회원들이 자주하는 질문 입니다!</p>
        </div>
        <div class="">
          <button class="accordion" type="button" name="button">경매는 어떤 방식으로 이루어지나요??</button>
          <div class="panel">
            <p>Lorem ipsum dolor는 amet, condictetur adipisicing elit, sed do eiusmod tempor incididunt ut ee 및 dolore magna aliqua에 앉아 있습니다. 가장 좋은 veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
          <button class="accordion" type="button" name="button">낙찰기준은 어떻게되나요?</button>
          <div class="panel">
            <p>Lorem ipsum dolor는 amet, condictetur adipisicing elit, sed do eiusmod tempor incididunt ut ee 및 dolore magna aliqua에 앉아 있습니다. 가장 좋은 veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
          <button class="accordion" type="button" name="button">거래방법은 어떻게되나요??</button>
          <div class="panel">
            <p>Lorem ipsum dolor는 amet, condictetur adipisicing elit, sed do eiusmod tempor incididunt ut ee 및 dolore magna aliqua에 앉아 있습니다. 가장 좋은 veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>

      </div>

      <div id="News" class="tabcontent">
        <div class="accordionheader">
          <h2>경매/입찰 문의</h2>
          <p>경매입찰 문의내역입니다.</p>
        </div>
        <div class="">
          <button class="accordion" type="button" name="button">경매는 어떤 방식으로 이루어지나요??</button>
          <div class="panel">
            <p>Lorem ipsum dolor는 amet, condictetur adipisicing elit, sed do eiusmod tempor incididunt ut ee 및 dolore magna aliqua에 앉아 있습니다. 가장 좋은 veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
          <button class="accordion" type="button" name="button">낙찰기준은 어떻게되나요?</button>
          <div class="panel">
            <p>Lorem ipsum dolor는 amet, condictetur adipisicing elit, sed do eiusmod tempor incididunt ut ee 및 dolore magna aliqua에 앉아 있습니다. 가장 좋은 veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
          <button class="accordion" type="button" name="button">거래방법은 어떻게되나요??</button>
          <div class="panel">
            <p>Lorem ipsum dolor는 amet, condictetur adipisicing elit, sed do eiusmod tempor incididunt ut ee 및 dolore magna aliqua에 앉아 있습니다. 가장 좋은 veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
      </div>
     </div>

      <div id="Contact" class="tabcontent">
        <div class="accordionheader">
          <h2>1:1상담</h2>
          <p>경매입찰 문의내역입니다.</p>
        </div>
        <div class="">
          <button class="accordion" type="button" name="button">경매는 어떤 방식으로 이루어지나요??</button>
          <div class="panel">
            <p>Lorem ipsum dolor는 amet, condictetur adipisicing elit, sed do eiusmod tempor incididunt ut ee 및 dolore magna aliqua에 앉아 있습니다. 가장 좋은 veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
          <button class="accordion" type="button" name="button">낙찰기준은 어떻게되나요?</button>
          <div class="panel">
            <p>Lorem ipsum dolor는 amet, condictetur adipisicing elit, sed do eiusmod tempor incididunt ut ee 및 dolore magna aliqua에 앉아 있습니다. 가장 좋은 veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
          <button class="accordion" type="button" name="button">거래방법은 어떻게되나요??</button>
          <div class="panel">
            <p>Lorem ipsum dolor는 amet, condictetur adipisicing elit, sed do eiusmod tempor incididunt ut ee 및 dolore magna aliqua에 앉아 있습니다. 가장 좋은 veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
      </div>
    </div>
  </div>
  <div class="tung"></div>
</div>
<script type="text/javascript">
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
@endsection
