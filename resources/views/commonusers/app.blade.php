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
                                <li><a href="/user/logout">Logout</a></li>
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
                    <li class="active"><a href="/user/"><i class="icon-home"></i><span>Halaman Utama</span> </a>
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
                            <li><a href="{{ url('/user/pengajuan-IMB') }}">Izin Mendirikan Bangunan</a></li>
                            <li><a href="{{ url('/user/pengajuan-lokasi') }}">Izin Lokasi</a></li>
                        </ul>                   
                    </li>
                    <li class="active"><a href="{{ url('/user/pengaduan') }}"><i class="icon-info-sign"></i>
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
                            <li><a href="{{ url('/user/tataruang') }}">Tata Ruang Bandung</a></li>
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
                        @yield('content')
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
                            <li><a href="/user/pengajuan-IMB">Ajukan Permohonan</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span4">
                        <h4>
                            Izin Lokasi</h4>
                        <ul>
                            <li><a href="/user/pengajuan-lokasi">Ajukan Permohonan</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span4">
                        <h4>
                            Tata Ruang</h4>
                        <ul>
                            <li><a href="/user/tataruang/peta">Lihat Tata Ruang</a></li>
                        </ul>
                    </div>
                    <div class="span12">
                        <br><br>
                        &copy; Azabalakisimawa - <a href="/user">PIMO</a>.
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

        <style>
        .bg-primary {
    background-color: #68cacd;
    margin-top: -36px;
    padding: 120px;
    color: #ffffff;
}

.section-heading {
    margin-top: 0;
}

hr {
    max-width: 50px;
    border-color: #f05f40;
    border-width: 3px;
}

hr.light {
    border-color: #fff;
}

.text-faded {
    color: rgba(255,255,255,.7);
}

.img-responsive{max-width: 100%; height: auto;}

.bg-yellow {
    background-color: #f05f40;
    padding: 120px;
    color: #ffffff;
    margin-top: -36px;
}

.title {
    margin-top: 0;
    font-size: 50px;
}

.btn-sample {
    color: #FFFFFF;
    background-color: #F05F40;
    border: solid 5px #FFFFFF;
    border-radius: 0px;
    padding: 10px;
}

.btn-sample:hover,
.btn-sample:focus,
.btn-sample:active,
.btn-sample.active,
.btn-sample.disabled,
.btn-sample[disabled] {
    color: #FFFFFF;
    background-color: #F05F40;
}

.btn-sample-blue {
    color: #FFFFFF;
    background-color: #68cacd;
    border: solid 5px #FFFFFF;
    border-radius: 0px;
    padding: 10px;
}

.btn-sample-blue:hover,
.btn-sample-blue:focus,
.btn-sample-blue:active,
.btn-sample-blue.active,
.btn-sample-blue.disabled,
.btn-sample-blue[disabled] {
    color: #FFFFFF;
    background-color: #68cacd;
}

.bg-yellow-bottom {
    background-color: #f05f40;
    padding: 120px;
    color: #ffffff;
    margin-top: -36px;
    margin-bottom: -26px;
}

.carous{
    color: #FFFFFF;
}

a.we{
    color: #ffffff;
    text-decoration: underline;
}
    </style>
</body>
</html>
