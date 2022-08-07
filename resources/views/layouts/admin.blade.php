<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('adminlte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('sweetalert::alert')
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
			<a class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ url('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">HMI Cakaba</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('adminlte/dist/img/avatar-default.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ \Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/admin') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          @if(auth()->user()->hasRole('admin-komisariat'))
          <li class="nav-item">
            <a href="{{ url('/admin/pendaftar-lk') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pendaftar LK1
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/kader-komisariat') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Kader Komisariat
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/opsi-komisariat') }}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Opsi Komisariat
              </p>
            </a>
          </li>
          @endif

          @if(auth()->user()->hasRole('super-admin'))
          <li class="nav-item">
            <a href="{{ url('/admin/about') }}" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Tentang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/komisariat') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Interkoneksi Cakaba
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/news-category') }}" class="nav-link">
              <i class="nav-icon fas fa-network-wired"></i>
              <p>
                Kategori Berita
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/slider') }}" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/social-media') }}" class="nav-link">
              <i class="nav-icon fas fa-hashtag"></i>
              <p>
                Sosial Media
              </p>
            </a>
          </li>
          @endif

          @if(auth()->user()->hasRole(['super-admin', 'admin-bpl', 'admin-cabang']))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Surat Rekomendasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/pengajuan-surat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
              @if(auth()->user()->hasRole('super-admin'))
              <li class="nav-item">
                <a href="{{ url('/admin/template-surat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Template</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @endif

          @if(auth()->user()->hasRole('super-admin'))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Akun
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/user/publik') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Publik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/user/kader') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kader</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/user/kahmi') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kahmi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/user/admin-komisariat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Komisariat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/user/admin-bpl') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BPL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/user/admin-cabang') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cabang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/user/super-admin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Super Admin</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth()->user()->hasRole(['super-admin', 'admin-bpl', 'admin-cabang', 'admin-kohati']))
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-star"></i>
              <p>
                Training Raya
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    LK2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/materi-screening-lk2') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Materi Screening LK2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/materi-forum-lk2') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Materi Forum LK2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/screener-lk2') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Screener LK2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/pendaftar-lk2') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Pendaftar LK2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/resume-lk2') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Resume LK2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/respon-harian-lk2') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Respon Harian LK2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/middle-test-lk2') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Middle Test LK2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/final-test-lk2') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Final Test LK2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/kelulusan-akhir-lk2') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Kelulusan Akhir</p>
                    </a>
                  </li>
                </ul>
              </li>
              
              
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    LKK
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/materi-screening-lkk') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Materi Screening LKK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/materi-forum-lkk') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Materi Forum LKK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/screener-lkk') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Screener LKK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/pendaftar-lkk') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Pendaftar LKK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/resume-lkk') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Resume LKK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/respon-harian-lkk') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Respon Harian LKK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/middle-test-lkk') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Middle Test LKK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/final-test-lkk') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Final Test LKK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/kelulusan-akhir-lkk') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Kelulusan Akhir</p>
                    </a>
                  </li>
                </ul>
              </li>
              
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    SC
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/materi-screening-sc') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Materi Screening SC</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/materi-forum-sc') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Materi Forum SC</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/screener-sc') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Screener SC</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/pendaftar-sc') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Pendaftar SC</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/resume-sc') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Resume SC</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/respon-harian-sc') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Respon Harian SC</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/middle-test-sc') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Middle Test SC</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/final-test-sc') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Final Test SC</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/training-raya/kelulusan-akhir-sc') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Kelulusan Akhir</p>
                    </a>
                  </li>
                </ul>
              </li>
              
            </ul>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('contents')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; @php echo date('Y'); @endphp HMI CAKABA.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('adminlte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('adminlte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('adminlte/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('adminlte/dist/js/demo.js') }}"></script>
@yield('scripts')
</body>
</html>
