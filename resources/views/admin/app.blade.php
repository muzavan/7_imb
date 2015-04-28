
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin IMB, Izin Lokasi, dan Tata Ruang</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset ('/admins/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset ('/admins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    
    <!-- Custom styles for this template -->
    <link href="{{asset ('/admins/css/style.css') }}" rel="stylesheet">
    <link href="{{asset ('/admins/css/style-responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('/admins/css/to-do.css') }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="/admin" class="logo"><b>PIMO</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                    
                  <li class="mt">
                      <a href="/admin">
                          <i class="fa fa-dashboard"></i>
                          <span>Halaman Utama</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>IMB</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin/imb">Semua Izin</a></li>
                          <li><a  href="#">Izin dalam Proses</a></li>
                          <li><a  href="#">Izin Diterima</a></li>
                          <li><a  href="#">Izin Ditolak</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Izin Lokasi</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin/lokasi">Semua Izin</a></li>
                          <li><a  href="#">Izin dalam Proses</a></li>
                          <li><a  href="#">Izin Diterima</a></li>
                          <li><a  href="#">Izin Ditolak</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Tata Ruang</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin/lokasi">Peta</a></li>
                          <li><a  href="#">Permohonan Tata Ruang</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Pengaduan</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin/lokasi">IMB</a></li>
                          <li><a  href="#">Izin Lokasi</a></li>
                          <li><a  href="#">Tata Ruang</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      @yield('content')

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 - Azabalakisimawa
              <a href="/admin" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset ('/admins/js/jquery.js') }}"></script>
    <script src="{{asset ('/admins/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{asset ('/admins/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{asset ('/admins/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{asset ('/admins/js/jquery.nicescroll.js') }}" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="{{asset ('/admins/js/common-scripts.js') }}"></script>

    <!--script for this page-->
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>    
    <script src="{{asset ('/admins/js/tasks.js') }}" type="text/javascript"></script>

    <script>
      jQuery(document).ready(function() {
          TaskList.initTaskWidget();
      });

      $(function() {
          $( "#sortable" ).sortable();
          $( "#sortable" ).disableSelection();
      });

    </script>
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
