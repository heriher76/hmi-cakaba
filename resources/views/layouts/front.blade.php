<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HMI Kab.Bandung</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('front/assets/img/logo_cakaba_green.png') }}" rel="icon">
  <link href="{{ url('front/assets/img/logo_cakaba_green.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('front/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ url('front/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ url('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('front/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('front/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ url('front/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ url('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('front/assets/css/style.css') }}" rel="stylesheet">

  <style type="text/css">
    .read-more a {
      display: inline-block;
      background: #1bbd36;
      color: #fff;
      padding: 17px 20px;
      font-size: 0.6rem;
      margin-left: 15px;
      transition: 0.3s;
      border-radius: 4px;
    }
    .read-more a:hover {
      color: black;
    }
  </style>

  @yield('style')

  <!-- =======================================================
  * Template Name: Company - v4.7.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @include('sweetalert::alert')
  
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ url('/') }}"><img src="{{ url('front/assets/img/logo_hmi.png') }}"> <span style="display: inline-block;">HMI</span>CAKABA</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          
          <li><a href="{{ url('/daftar-training-raya') }}">Daftar Training Raya</a></li>

          <li class="dropdown"><a href="#"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ url('/tentang') }}">HMI Cakaba</a></li>
              <li><a href="{{ url('/visi-misi') }}">Visi Misi</a></li>
              <li><a href="{{ url('/program-kerja') }}">Program Kerja</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Pelayanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ url('/surat-rekomendasi') }}">Surat Rekomendasi Training</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Berita</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @foreach($categories as $category)
              <li><a href="{{ url('/berita/'.\Str::slug($category->name)) }}">{{ $category->name }}</a></li>
              @endforeach
            </ul>
          </li>

          <li><a href="{{ url('/kontak') }}">Kontak</a></li>

          @guest
          <li><a href="{{ url('/login') }}">Masuk</a></li>  <!-- class="active" -->
          @else
          <li class="dropdown"><a href="#" class="active"><span>{{ 'Hi,' . auth()->user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @if(auth()->user()->hasRole(['super-admin', 'admin-komisariat', 'admin-bpl', 'admin-cabang', 'admin-kohati']))
              <li><a href="{{ url('/admin') }}">Dashboard</a></li>
              @endif
              @if(auth()->user()->hasRole(['user-lk2', 'user-lkk', 'user-sc']))
              <li><a href="{{ url('/dashboard-training') }}">Dashboard Training</a></li>
              @else
              <li><a href="{{ url('/my-profile') }}">Profil Saya</a></li>
              @endif
              <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Keluar') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
          </li>
          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <div class="read-more">
          <a href="{{ url('join-hmi') }}"><b style="font-family: 'Roboto' !important;">JOIN HMI</b></a>
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>HMI CAKABA</h3>
            <p>
              {{$social->address}}
              <br><br>
              <strong>HP/Whatsapp:</strong> {{$social->contact}} <br>
              <strong>Email:</strong> {{$social->email}}<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Navigasi</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/tentang') }}">Tentang HMI Cakaba</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/surat-rekomendasi') }}">Surat Rekomendasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/berita') }}">Berita</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/kontak') }}">Kontak</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Kategori Berita</h4>
            <ul>
              @foreach($categories as $category)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('berita/'.\Str::slug($category->name)) }}">{{ $category->name }}</a></li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-newsletter">
            <h4>Mari ber-HMI</h4>
            <p>Yakin Usaha Sampai!</p>
            <img src="{{ url('/front/assets/img/logo_cakaba_white.png') }}" style="width: 100px;">
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>HMI CAKABA</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          Designed by NalarC0de
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="//{{ $social->instagram ?? '#' }}" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="//wa.me/{{ $social->contact ?? '#' }}" target="_blank" class="instagram"><i class="bx bxl-whatsapp"></i></a>
        <a href="mailto:{{ $social->email ?? '#' }}" target="_blank" class="linkedin"><i class="bx bx-envelope"></i></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('front/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ url('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ url('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('front/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ url('front/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('front/assets/js/main.js') }}"></script>

  @yield('script')

</body>

</html>