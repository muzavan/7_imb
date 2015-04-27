<!DOCTYPE html>
<html lang="en">
<head>
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
                </a><a class="brand" href="index.html">PIMO</a>
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
                    <li class="active"><a href="index.html"><i class="icon-home"></i><span>Halaman Utama</span> </a>
                    </li>
                    <li class="active"><a href="{{ url('/informasis') }}"><i class="icon-info-sign"></i><span>Informasi</span> </a>
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
                    <li class="dropdown active">                    
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-envelope-alt"></i>
                            <span>Ajukan Pengaduan</span>
                            <b class="caret"></b>
                        </a>    

                        <ul class="dropdown-menu">
                            <li><a href="icons.html">Izin Mendirikan Bangunan</a></li>
                            <li><a href="faq.html">Izin Lokasi</a></li>
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
        var doughnutData = [
				{
				    value: 30,
				    color: "#F7464A"
				},
				{
				    value: 50,
				    color: "#46BFBD"
				},
				{
				    value: 100,
				    color: "#FDB45C"
				},
				{
				    value: 40,
				    color: "#949FB1"
				},
				{
				    value: 120,
				    color: "#4D5360"
				}

			];

        var myDoughnut = new Chart(document.getElementById("donut-chart").getContext("2d")).Doughnut(doughnutData);


        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    pointColor: "rgba(220,220,220,1)",
				    pointStrokeColor: "#fff",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    pointColor: "rgba(151,187,205,1)",
				    pointStrokeColor: "#fff",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }

var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);

var pieData = [
				{
				    value: 30,
				    color: "#F38630"
				},
				{
				    value: 50,
				    color: "#E0E4CC"
				},
				{
				    value: 100,
				    color: "#69D2E7"
				}

			];

				var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);

				var chartData = [
			{
			    value: Math.random(),
			    color: "#D97041"
			},
			{
			    value: Math.random(),
			    color: "#C7604C"
			},
			{
			    value: Math.random(),
			    color: "#21323D"
			},
			{
			    value: Math.random(),
			    color: "#9D9B7F"
			},
			{
			    value: Math.random(),
			    color: "#7D4F6D"
			},
			{
			    value: Math.random(),
			    color: "#584A5E"
			}
		];
				var myPolarArea = new Chart(document.getElementById("line-chart").getContext("2d")).PolarArea(chartData);
	</script>
</body>
</html>
