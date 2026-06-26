<!DOCTYPE html>
<html class="bootstrap-layout">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title')</title>
<meta name="robots" content="noindex">
<link href="{{ url('/assets/assets/css/googlefont.css') }}" rel="stylesheet">
<link type="text/css" href="{{ url('/assets/assets/libs/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link type="text/css" href="{{ url('/assets/assets/css/style.min.css') }}" rel="stylesheet">
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

/* ===== NAVBAR ===== */
.navbar.bg-primary {
  background: linear-gradient(135deg, #1d4ed8, #3b82f6) !important;
  box-shadow: 0 2px 16px rgba(29,78,216,0.25);
  border-bottom: none;
}
.navbar-brand {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  letter-spacing: 0.3px;
  font-size: 16px;
}

/* ===== SIDEBAR ===== */
.sidebar-left {
  background: #fff !important;
  border-right: 1px solid #e0e7ff !important;
  box-shadow: 2px 0 12px rgba(99,102,241,0.06);
}
.sidebar-heading {
  font-family: 'Inter', sans-serif;
  font-size: 10px !important;
  font-weight: 700 !important;
  letter-spacing: 1.5px !important;
  color: #94a3b8 !important;
  padding: 20px 20px 8px !important;
  text-transform: uppercase;
}
.sidebar-menu-button {
  font-family: 'Inter', sans-serif;
  font-size: 13px !important;
  font-weight: 500 !important;
  color: #475569 !important;
  border-radius: 10px !important;
  margin: 2px 10px !important;
  padding: 10px 14px !important;
  transition: all 0.2s !important;
  display: flex !important;
  align-items: center !important;
  gap: 10px;
}
.sidebar-menu-button:hover {
  background: #eff6ff !important;
  color: #1d4ed8 !important;
}
.sidebar-menu-item.active .sidebar-menu-button {
  background: linear-gradient(135deg, #eff6ff, #dbeafe) !important;
  color: #1d4ed8 !important;
  font-weight: 600 !important;
  border-left: 3px solid #3b82f6;
}
.sidebar-menu-icon {
  width: 18px;
  text-align: center;
  font-size: 15px !important;
}

/* Logout merah */
.sidebar-menu-item:last-child .sidebar-menu-button:hover {
  background: #fef2f2 !important;
  color: #dc2626 !important;
}
.sidebar-menu-item:last-child .sidebar-menu-icon {
  color: #ef4444;
}

/* Version */
.sidebar p.text-danger {
  font-size: 11px !important;
  padding: 0 20px;
  color: #cbd5e1 !important;
  font-family: 'Inter', sans-serif;
}

/* ===== CONTENT AREA ===== */
.layout-content {
  background: #f0f4ff !important;
}
.breadcrumb {
  background: transparent !important;
  font-family: 'Inter', sans-serif;
  font-size: 13px;
}
.breadcrumb a { color: #3b82f6; }
.breadcrumb .active { color: #94a3b8; }

/* ===== FOOTER ===== */
.layout-content .col-md-12[style*="color: #b3bfd1"] {
  color: #cbd5e1 !important;
  font-size: 11px !important;
  font-family: 'Inter', sans-serif;
}
</style>
</head>

<body class="layout-container ls-top-navbar si-l3-md-up" onkeydown="return (event.keyCode != 116)">
<script>
window.onload = function(){
  document.onkeydown = function(e){ return (e.which || e.keyCode) != 116; };
}
</script>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-primary navbar-full navbar-fixed-top">
  <button class="navbar-toggler pull-xs-left" type="button" data-toggle="sidebar" data-target="#sidebarLeft">
    <i class="fa fa-bars"></i>
  </button>
  <a href="{{ url('/siswa') }}" class="navbar-brand">
    <i class="fa fa-graduation-cap"></i> CBT Siswa
  </a>
  <?php
    $foto = Auth::user()->gambar != "" ? Auth::user()->gambar : 'siswa.png';
  ?>
  <ul class="nav navbar-nav pull-xs-right">
    <li class="nav-item dropdown">
      <a class="nav-link active dropdown-toggle p-a-0" data-toggle="dropdown" href="#" role="button">
        <img src="{{ url('/img/'.$foto) }}" alt="Avatar" class="img-circle" width="36"
             style="border: 2px solid rgba(255,255,255,0.5); object-fit:cover;">
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-list">
        <a class="dropdown-item" href="{{ url('/profil-siswa') }}">
          <i class="fa fa-user-circle"></i> Profil
        </a>
        <a class="dropdown-item" href="{{ url('/auth/logout') }}">
          <i class="fa fa-sign-out"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>

<!-- SIDEBAR -->
<?php $url = Request::segment(1); ?>
<div class="sidebar sidebar-left sidebar-light sidebar-visible-md-up si-si-3 ls-top-navbar-xs-up sidebar-transparent-md" id="sidebarLeft" data-scrollable>
  <div class="sidebar-heading">Navigasi</div>
  <ul class="sidebar-menu">
    <li <?php if($url=="siswa"){echo "class='sidebar-menu-item active'";}?>>
      <a class="sidebar-menu-button" href="{{ url('/siswa') }}">
        <i class="sidebar-menu-icon fa fa-home"></i> Home
      </a>
    </li>
    <li <?php if($url=="profil-siswa"){echo "class='sidebar-menu-item active'";}?>>
      <a class="sidebar-menu-button" href="{{ url('/profil-siswa') }}">
        <i class="sidebar-menu-icon fa fa-user"></i> Profil
      </a>
    </li>
    <li <?php if($url=="latihan"){echo "class='sidebar-menu-item active'";}?>>
      <a class="sidebar-menu-button" href="{{ url('/latihan') }}">
        <i class="sidebar-menu-icon fa fa-pencil-square-o"></i> Latihan Materi
      </a>
    </li>
    <li <?php if($url=="hasil-siswa"){echo "class='sidebar-menu-item active'";}?>>
      <a class="sidebar-menu-button" href="{{ url('/hasil-siswa') }}">
        <i class="sidebar-menu-icon fa fa-book"></i> Hasil Ujian
      </a>
    </li>
    <li <?php if($url=="soal-siswa"){echo "class='sidebar-menu-item active'";}?>>
      <a class="sidebar-menu-button" href="{{ url('/soal-siswa') }}">
        <i class="sidebar-menu-icon fa fa-list-alt"></i> Soal Ujian
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a class="sidebar-menu-button" href="{{ url('/auth/logout') }}">
        <i class="sidebar-menu-icon fa fa-sign-out"></i> Logout
      </a>
    </li>
  </ul>
  <p class="text-danger">v{{ config('app.version') }}</p>
</div>

<!-- CONTENT -->
<div class="layout-content" data-scrollable>
  <div class="container-fluid">
    <ol class="breadcrumb">
      @yield('breadcrumb')
    </ol>
    <div class="row">
      @yield('content')
    </div>
    <div class="row">
      <div class="col-md-12" style="color:#b3bfd1; font-size:12px; font-family:'Inter',sans-serif; padding-bottom:30px;">
        <hr style="border-color:#e0e7ff;">
        Copyright &copy; 2016-2017 Tipamedia &mdash;
        Modified by Merak ICT Team for SMK Muhammadiyah Sampit.
      </div>
    </div>
  </div>
</div>

<script src="{{ url('/assets/assets/vendor/jquery.min.js') }}"></script>
<script src="{{ url('/assets/assets/vendor/tether.min.js') }}"></script>
<script src="{{ url('/assets/assets/vendor/bootstrap.min.js') }}"></script>
<script src="{{ url('/assets/assets/vendor/adminplus.js') }}"></script>
<script src="{{ url('/assets/assets/js/main.min.js') }}"></script>
<script>
  $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
</script>
</body>
</html>
