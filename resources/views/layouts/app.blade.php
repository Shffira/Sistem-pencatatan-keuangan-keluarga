<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Dashboard- Keuangan Keluarga</title>
    
    <link rel="apple-touch-icon" href="{{ asset('chameleon/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('chameleon/images/ico/favicon.ico') }}">
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('chameleon/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('chameleon/fonts/feather/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('chameleon/vendors/css/charts/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('chameleon/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('chameleon/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('chameleon/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('chameleon/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('chameleon/css/app-lite.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('chameleon/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('chameleon/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('chameleon/css/pages/dashboard-ecommerce.css') }}">
    </head>
  <body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true" data-img="{{ asset('chameleon/images/backgrounds/02.jpg') }}">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto">
            <a class="navbar-brand" href="#">
              <img class="brand-logo" alt="Logo Keuangan Keluarga" src="{{ asset('chameleon/images/logo/logo-keuangan-keluarga.svg') }}"/>
              <h3 class="brand-text">Keuangan Keluarga</h3>
            </a>
          </li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation">
            <li>
                <a href="{{ route('transaksi.index') }}">
                    <i class="ft-home"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.create') }}">
                    <i class="ft-plus-circle"></i>
                    <span class="menu-title">Tambah Transaksi</span>
                </a>
            </li>
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row"></div>
        <div class="content-body">
          @yield('content') 
      </div>
    </div>

    <script src="{{ asset('chameleon/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('chameleon/vendors/js/charts/chartist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('chameleon/js/core/app-menu-lite.js') }}" type="text/javascript"></script>
    <script src="{{ asset('chameleon/js/core/app-lite.js') }}" type="text/javascript"></script>
    <script src="{{ asset('chameleon/js/scripts/pages/dashboard-lite.js') }}" type="text/javascript"></script>
    </body>
</html>