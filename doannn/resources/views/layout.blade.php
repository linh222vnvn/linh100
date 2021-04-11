
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GIS | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('Public/backend/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Public/backend/css/adminlte.min.css')}}">
    <!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('Public/backend/js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('Public/backend/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Public/backend/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('Public/backend/js/demo.js')}}"></script>
 <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
 <script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>
<!-- REQUEI  LEFESE -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css" type="text/css">
    <link rel="stylesheet" href="{{asset('public/backend/css/style2.css')}}" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-blue">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="{{('Public/backend/images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GIS ĐẤT CÔNG</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Gửi Phản Hồi</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Chỉnh Layer</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><input type="checkbox" id="chkThuaDat" checked /><label for="chkThuaDat">Thửa đất</label></li>
              <li><input type="checkbox" id="chkHCHuyen" checked /><label for="chkHCHuyen">Hành chính huyện</label></li>
              <li><input type="checkbox" id="chkHCXa" checked /><label for="chkHCXa">Hành chính xã</label></li>
              <!-- End Level two -->
            </ul>
          </li>
          <li class="nav-item">
          <input type="number" id="txSoto" placeholder="Số tờ..." value="" />
				<input type="number" id="txtSothua" placeholder="Số thửa..." value="" />
          </li>
          <li class="nav-item">
          <button id="btnTimthua">Tìm thửa</button>

          </li>
        </ul>

        <!-- SEARCH FORM -->
       
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          
        <li class="nav-item">
          <a class="nav-link" data-slide="true" href="{{URL::to('/login')}}" role="button">
            <i class=""></i>Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-slide="true" href="{{URL::to('/index-user')}}" role="button">
            <i class=""></i>Test</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
            <h1 class="m-0"><small>{{$title}}</small></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
         
                     @yield('content')

            
          
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  
  <script src="{{asset('public/frontend/js/mainuser.js')}}"></script>

</body>
</html>
