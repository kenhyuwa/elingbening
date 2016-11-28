<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo1.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/alte/plugins/datatables/dataTables.bootstrap.css') }}">
    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ asset('assets/alte/plugins/select2/select2.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/alte/font-awesome/css/font-awesome.min.css') }}">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="{{ asset('assets/SweetAlert/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/SweetAlert/animate.css') }}">
    {{-- Datepicker --}}
    <link rel="stylesheet" href="{{asset('assets/alte/plugins/datepicker/datepicker3.css')}}">
    <!-- Theme style -->
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('assets/alte/plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/alte/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/alte/dist/css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
      .btn {
        border-radius: 1px !important;
      }
      .btn-xs {
        padding: 1px 10px 1px 10px;
        margin: -3px 2px -3px 2px;
        display: inline-table
      }
    </style>
  </head>
  <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
  <!-- the fixed layout is not compatible with sidebar-mini -->
  <body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">EB</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Eling</b><i>-Bening</i></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li id="notifikasi" class="dropdown notifications-menu">
                {{-- notify --}}
              </li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if(!empty(auth()->user()->getPegawai->picture))
                  <img src="{{ asset('upload/images/thumbnails/'.auth()->user()->getPegawai->picture) }}" class="user-image" alt="User Image">
                  @else
                  <img src="{{ asset('assets/images/gbr.png') }}" class="user-image" alt="User Image">
                @endif
                  <span class="hidden-xs">
                      <?php 
                        $users = auth()->user()->getPegawai->name;
                        $jumlah = 1;
                        $hasil = implode(' ', array_slice(explode(' ', $users), 0, $jumlah));
                      ?>
                      <i>{{ ucfirst($hasil) }}'s</i>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header" style="background-size: cover;padding-top: 20px;">
                  @if(!empty(auth()->user()->getPegawai->picture))
                    <img src="{{ asset('upload/images/thumbnails/'.auth()->user()->getPegawai->picture) }}" class="img-circle" alt="User Image">
                    @else
                    <img src="{{ asset('assets/images/gbr.png') }}" class="img-circle" alt="User Image">
                  @endif
                    <p>
                      {{ ucwords((auth()->user()->getPegawai->name)) }}
                      <small>{{ ucfirst((auth()->user()->getPegawai->level)) }}</small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{ URL('my-profile/'.base64_encode(auth()->user()->id)) }}" class="btn btn-info btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();" class="btn btn-danger btn-flat">Sign out</a>
                         <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                  </li>
                </ul>
              </li>
              <li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="image">
              <img src="{{ asset('assets/images/logo.jpg') }}" class="img-circle" alt="User Image">
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{ ($active['ul'] == 'home') ? 'active' : '' }}">
              <a href="{{ URL('dashboard') }}">
                <i class="fa fa-google-wallet {{ ($active['ul'] == 'home') ? 'text-aqua' : '' }}"></i> <span> Dashboard</span>
              </a>
            </li>
            @if(auth()->user()->getPegawai->level == 'casier')
            <li class="header">MENU</li>
            <li class="treeview {{ ($active['ul'] == 'orders') ? 'active' : '' }}">
              <a href="#">
                <i class="fa fa-shopping-cart {{ ($active['ul'] == 'orders') ? 'text-aqua' : '' }}"></i> <span>Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($active['li'] == 'order') ? 'active' : '' }}">
                      <a href="{{ URL('order') }}"><i class="fa fa-circle-o text-green"></i> Pemesanan tiket</a>
                </li>
                <li class="{{ ($active['li'] == 'list-order') ? 'active' : '' }}">
                      <a href="{{ URL('list-order') }}"><i class="fa fa-circle-o text-green"></i> Data penjualan</a>
                </li>
                <li class="{{ ($active['li'] == 'guest') ? 'active' : '' }}">
                      <a href="{{ URL('guest') }}"><i class="fa fa-circle-o text-green"></i> Data Pengunjung</a>
                </li>
              </ul>
            </li>
            <li class="treeview {{ ($active['ul'] == 'report') ? 'active' : '' }}">
              <a href="#">
                <i class="fa fa-file-pdf-o {{ ($active['ul'] == 'report') ? 'text-aqua' : '' }}"></i> <span>Report</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($active['li'] == 'jual') ? 'active' : '' }}">
                      <a href="{{ URL('report/jual') }}"><i class="fa fa-circle-o text-green"></i> Data penjualan</a>
                </li>
                <li class="{{ ($active['li'] == 'pengunjung') ? 'active' : '' }}">
                      <a href="{{ URL('report/pengunjung') }}"><i class="fa fa-circle-o text-green"></i> Data Pengunjung</a>
                </li>
              </ul>
            </li>
            <li class="header">SETTING</li>
            <li class="{{ ($active['li'] == 'message') ? 'active' : '' }}">
              <a href="{{ URL('message') }}"><i class="fa fa-envelope-o text-green"></i> <span>Message</span></a>
            </li>
            <li class="{{ ($active['li'] == 'account') ? 'active' : '' }}">
              <a href="{{ URL('my-profile/'.base64_encode(auth()->user()->id)) }}"><i class="fa fa-lock text-red"></i> <span>My profile</span></a>
            </li>
            @else
            <li class="header">MENU</li>
            <li class="treeview {{ ($active['ul'] == 'report') ? 'active' : '' }}">
              <a href="#">
                <i class="fa fa-file-pdf-o {{ ($active['ul'] == 'report') ? 'text-aqua' : '' }}"></i> <span>Report</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($active['li'] == 'jual') ? 'active' : '' }}">
                      <a href="{{ URL('report/jual') }}"><i class="fa fa-circle-o text-green"></i> Data penjualan</a>
                </li>
                <li class="{{ ($active['li'] == 'pengunjung') ? 'active' : '' }}">
                      <a href="{{ URL('report/pengunjung') }}"><i class="fa fa-circle-o text-green"></i> Data pengunjung</a>
                </li>
              </ul>
            </li>
            <li class="header">SETTING</li>
            <li class="{{ ($active['li'] == 'user') ? 'active' : '' }}">
              <a href="{{ URL('pegawai') }}"><i class="fa fa-users text-green"></i> <span>User</span></a>
            </li>
            <li class="{{ ($active['li'] == 'account') ? 'active' : '' }}">
              <a href="{{ URL('my-profile/'.base64_encode(auth()->user()->id)) }}"><i class="fa fa-lock text-red"></i> <span>My profile</span></a>
            </li>
            @endif
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
        @include('partials.modal')
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 0.0.1
        </div>
        <strong>Copyright &copy; 2016-{{ date('Y') }} <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('assets/alte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets/alte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/alte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    {{-- SweetAlert --}}
    <script src="{{ asset('assets/SweetAlert/sweetalert.min.js') }}"></script>
    {{-- Select2 --}}
    <script src="{{ asset('assets/alte/plugins/select2/select2.min.js') }}"></script>
    <!-- datepicker -->
    <script src="{{asset('assets/alte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
     <!-- InputMask -->
    <script src="{{asset('assets/alte/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('assets/alte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('assets/alte/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset('assets/alte/plugins/chartjs/Chart.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/alte/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/alte/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/alte/dist/js/demo.js') }}"></script>
    <script>
    // URL
    var APP_URL= {!! json_encode(url('/')) !!};
      // Select2 focusAble
    $.fn.modal.Constructor.prototype.enforceFocus = function(){};

var notifikasi = function()
    {
      var url = APP_URL+'/notify';

      $.ajax({
        type:"GET",
        cache:false,
        url:url,
        success: function(data){
          $('#notifikasi').html(data);
          $('#bell').addClass('animated wobble').siblings().addClass('animated flash');
          timer = setTimeout("notifikasi()",5000);
        }
      });
    }

    $(function(){
        $('.modal').on('shown.bs.modal', function () {
          $('.focus').focus();
          $('.select2').select2();
        });

        $('.modal').on('hide.bs.modal', function() {
          $('#modals').removeClass('wobble').addClass('zoomInDown');
        });

        $(window).load(function(){
          var load = APP_URL+'/load';
            $.ajax({
              type:"POST",
              url:load,
              beforeSend:function(xhr){
                var token = $('meta[name="csrf-token"]').attr('content');

                if(token){
                  return xhr.setRequestHeader('X-CSRF-TOKEN',token);
                }
              },
              success:function(data) {
                // console.log(data);
              }
            });
          });

        @if(auth()->check() && auth()->user()->getPegawai->level != 'casier')
        @else
        notifikasi();
        @endif

      });
    </script>
    @yield('script')
  </body>
</html>

