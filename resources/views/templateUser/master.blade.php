<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  {{-- <link href="{{asset('Regna/img/favicon.png')}}" rel="icon"> --}}
  <link href="{{asset('Regna/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  {{-- dataTable --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('Regna/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('Regna/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('Regna/lib/animate/animate.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('Regna/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Regna
    Theme URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header" class="header-fixed">
    <div class="container">

      <div id="logo" class="pull-left">
        {{-- <a href="#hero"><img src="{{asset('Regna/img/logo.png')}}" alt="" title="" /></img></a> --}}
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a href="#hero">SIMAKSI</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="{{url('/')}}">Home</a></li>
          <li><a href="{{url('simaksi')}}">Simaksi</a></li>
          <li><a href="">Pariwisata</a></li>
          @if(isset(Auth::user()->name))
          <li class="menu-has-children"><a href="">Hello, {{Auth::user()->name}}</a>
            <ul>
              <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              </li>
            </ul>
          </li>
          @else
            <li><a href="{{url('registrasi')}}">Registrasi</a></li>
            <li><a href="{{url('login')}}">Login</a></li>
          @endif
          {{-- <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="menu-has-children"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact Us</a></li> --}}
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->


  @yield('content')


  <!--==========================
    Footer
  ============================-->
  {{-- <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Regna</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer --> --}}

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{asset('Regna/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('Regna/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('Regna/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('Regna/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('Regna/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('Regna/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('Regna/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('Regna/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('Regna/lib/superfish/superfish.min.js')}}"></script>

  <!-- Contact Form JavaScript File -->
  {{-- <script src="contactform/contactform.js"></script> --}}

  <!-- Template Main Javascript File -->
  <script src="{{asset('Regna/js/main.js')}}"></script>

  {{-- dataTable --}}
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

  @yield('footer')

</body>
</html>