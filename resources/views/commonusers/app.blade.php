<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <meta charset="utf-8">
    <title>PIMO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{asset ('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset ('css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
    <link href="{{asset ('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset ('css/style.css')}}" rel="stylesheet">
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </a><a class="brand" href="/">PIMO</a>
                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;">Profil</a></li>
                                <li><a href="javascript:;">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-search pull-right">
                    <input type="text" class="search-query" placeholder="Search">
                    </form>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!-- /container -->
        </div>
        <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li class="active"><a href="/"><i class="icon-home"></i><span>Halaman Utama</span> </a>
                    </li>
                    <li class="active"><a href="{{ url('/informasi') }}"><i class="icon-info-sign"></i><span>Informasi</span> </a>
                    </li>
                    <li class="dropdown active">                    
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-hand-up"></i>
                            <span>Ajukan Permohonan</span>
                            <b class="caret"></b>
                        </a>    

                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/pengajuan-IMB') }}">Izin Mendirikan Bangunan</a></li>
                            <li><a href="{{ url('/pengajuan-lokasi') }}">Izin Lokasi</a></li>
                        </ul>                   
                    </li>
                    <li class="active"><a href="/pengaduan"><i class="icon-info-sign"></i>
                            <span>Ajukan Pengaduan</span>
                        </a>                    
                    </li>
                    <li class="dropdown active">                    
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-road"></i>
                            <span>Tata Ruang</span>
                            <b class="caret"></b>
                        </a>    

                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/tataruang') }}">Tata Ruang Bandung</a></li>
                            <li><a href="{{ url('/pengajuan-lokasi') }}">Ajukan Permohonan Tata Ruang</a></li>
                        </ul>                   
                    </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>
    <!-- /subnavbar -->
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <div class="span2">
                        @yield('sidebar')
                    </div>
                    <div class="span8">
                        @yield('content')
                    </div>
                    <!-- /span6 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-inner -->
    </div>
    <!-- /main -->
    <div class="extra">
        <div class="extra-inner">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <h4>
                            Izin Mendirikan Bangunan</h4>
                        <ul>
                            <li><a href="javascript:;">Informasi</a></li>
                            <li><a href="javascript:;">Ajukan Permohonan</a></li>
                            <li><a href="javascript:;">Ajukan Pengaduan</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span4">
                        <h4>
                            Izin Lokasi</h4>
                        <ul>
                            <li><a href="javascript:;">Informasi</a></li>
                            <li><a href="javascript:;">Ajukan Permohonan</a></li>
                            <li><a href="javascript:;">Ajukan Pengaduan</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span4">
                        <h4>
                            Tata Ruang</h4>
                        <ul>
                            <li><a href="javascript:;">Informasi</a></li>
                            <li><a href="javascript:;">Ajukan Permohonan</a></li>
                            <li><a href="javascript:;">Ajukan Pengaduan</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /extra-inner -->
    </div>
    <!-- /extra -->
    <!-- <div class="footer">
        <div class="footer-inner">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        &copy; Azabalakisimawa - <a href="index.html">PIMO</a>.
                    </div>
                    <!-- /span12 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /footer-inner -->
    </div>
    <!-- @yield('content') -->
    <!-- @yield('footer') -->
    <!-- /footer -->
    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset ('js/jquery-1.7.2.min.js')}}"></script>
    <script src="{{asset ('js/excanvas.min.js')}}"></script>
    <script src="{{asset ('js/chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset ('js/bootstrap.js')}}"></script>
    <script src="{{asset ('js/base.js')}}"></script>
    <script>

function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(-6.9167,107.6000),
    zoom:12,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);



$('body').on('change','#jenisruang',function(){
    var id = $(this).val();
    // var id = 1;
    $.ajax({
     url: 'tataruang/{id}',
     type: 'GET',
     data: {id: id},
     success: function(response){
         $('#tulisfungsi').html(response);
     }
    });
});

	</script>
</body>
</html>
