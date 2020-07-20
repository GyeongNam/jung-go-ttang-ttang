<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  {{-- 기본 경로 지정  ex) localhost/template/vendor/fontawesome-free/css/all.min.css--}}
  <base href="/template/"/>

  <title>중고땅땅-관리자페이지</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.11.3.js" type="text/javascript"></script>

  <script>






  </script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- 슬라이드 -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/manager_main">
        <div>

        </div>
        <div>중고땅땅 관리자 <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- 메인-->
      <li class="nav-item active">
        <a class="nav-link" href="/manager_main">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Main</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        엄
      </div>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/manager_item">
          <i class="fas fa-fw fa-table"></i>
          <span>상품관리</span></a>
      </li>


      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/manager_user">
          <i class="fas fa-fw fa-table"></i>
          <span>회원관리</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/manager_tok">
          <i class="fas fa-fw fa-table"></i>
          <span>상담관리</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/manager_policy">
          <i class="fas fa-fw fa-table"></i>
          <span>정책관리</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            @if(session('login_ID') == false)
              <li><a href="/Login">Login</a></li>
              <li><a href="/sign_rull">sign up</a></li>
            @else

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  관리자
              </span>
                <img class="img-profile rounded-circle" src="/img/r_heart.png">
              </a>
              <div class = "nav_login">
              </div>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
            @endif
          </ul>

          </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- 관리자페이지 -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">회원관리</h1>
          </div>




          {{-- 인터페이스 시작 --}}

          <div class="tableset">
            <div class="table1">
              <h4>회원정보</h4>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop" id="warn_but" name="button1" style="float:right;" >
                경고
              </button>
              {{-- 모델 --}}
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">경고</h5>
                        <button type="button" class="close" data-dismiss="modal"  name="button1" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        경고 주시겠습니까?
                      </div>
                      <div class="modal-footer">
                        <form action="/warning/{{$mana[0]->ID}}" method="post">
                          @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">취소</button>
                        <input type="hidden" name='item_number' class="form-control">
                        <button type="submit" class="btn btn-primary">경고주기</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- 모델끝 --}}
                <button type="button" name="button2" style="float:right;" data-toggle="modal" data-target="#staticBackdrop2" class="btn btn-info" id="warn_but1">정지풀기</button>
              {{-- 모델 --}}
                <div class="modal fade" id="staticBackdrop2" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">정지풀기</h5>
                        <button type="button" class="close" data-dismiss="modal"  name="button1" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        정지를 풀겠습니까?
                      </div>
                      <div class="modal-footer">
                        <form class="" action="/ban/{{$mana[0]->ID}}" method="post">
                          @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">취소</button>
                        <input type="hidden" name='item_number' class="form-control">
                        <button type="submit" class="btn btn-primary"  name="button2" >정지풀기</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- 모델끝 --}}
              <table class="table-bordered table table-hover table-responsive"  style="width:40%;" >
                <tr>
                  <th style="width:10%;">아이디</th>
                  <td style="width:10%;">{{$mana[0]->ID}}</td>
                </tr>
                <tr>
                  <th>이름</th>
                  <td>{{$mana[0]->name}}</td>
                </tr>
                <tr>
                  <th>이메일</th>
                  <td>{{$mana[0]->email}}<span>@</span>{{$mana[0]->email_domain}}</td>
                </tr>
                <tr>
                  <th>전화번호</th>
                  <td>{{$mana[0]->phone}}</td>
                </tr>
                <tr>
                  <th>경고횟수</th>
                  <td>{{$count}} 회</td>
                </tr>
            </table>

          </div>

          <div class="table1 " >
            <h4>경매 참여한 물품</h4>
            <table class="table-bordered table table-hover" id="table11" >
              <tr>
                <th>상품번호</th>
                <th>상품이름</th>
                <th>입찰금액</th>
                <th>낙찰유무</th>
                <th>거래유무</th>
              </tr>
              @foreach ($maif as $key => $value)

              <tr>
                <td>{{$value->item_number}}</td>
                <td>{{$value->item_name}}</td>
                <td>{{$value->item_price}}</td>
                @if ($value->success_user1 == $mana[0]->ID)
                  <td>1순위</td>
                @elseif ($value->success_user2 == $mana[0]->ID)
                  <td>2순위</td>
                @elseif ($value->success_user3 == $mana[0]->ID)
                  <td>3순위</td>
                @elseif ($value->success_user4 == $mana[0]->ID)
                  <td>4순위</td>
                @elseif ($value->success_user5 == $mana[0]->ID)
                  <td>5순위</td>
                @else
                  <td>x</td>
                  <td>순위안들어감</td>
                @endif
                @if ($value->buyer == $mana[0]->ID)
                  <td>낙찰완료</td>
                @elseif ($value->buyer != $mana[0]->ID)
                @endif

              </tr>
                @endforeach


            </table>

          </div>
          </div>


        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
        <!-- End of Main Content -->
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">로그아웃 하시겠습니까</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">로그인화면으로 돌아갑니다.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">취소</button>
                <a class="btn btn-primary" href="/manager_logout">Logout</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

</body>
</html>
