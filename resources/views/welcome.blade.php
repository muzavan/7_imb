<html>
  <head>
    <title>PIMO - Pengajuan Izin Membangun Online</title>

      <!-- Bootstrap Core CSS -->
      <link href="{{asset ('css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{asset ('css/bootflat.min.css') }}" rel="stylesheet">

      <!-- Custom CSS -->
      <link href="{{asset ('arina/css/style.css') }}" rel="stylesheet">

      <!-- Custom Fonts -->
      <link href="{{asset ('font-awesome/css/font-awesome.min.css') }}"" rel="stylesheet" type="text/css">
      <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <style>
      body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        color: #B0BEC5;
        display: table;
        font-weight: 100;
        font-family: 'Lato';
        background-image: url("{{asset ('img/bgppl2.png') }}");
      }

      .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
      }

      .content {
        text-align: center;
        display: inline-block;
      }

      .title {
        font-size: 96px;
        margin-bottom: 40px;
      }

      .quote {
        font-size: 24px;
      }
      .nav.navbar-nav > ul >li > a:hover{
        color: #dddd00;
      }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PIMO</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{url('/home')}}">MASUK</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
      <div class="content">
        <div class="title">PIMO</div>
        <div class="quote">Pengajuan Izin Mendirikan Online</div>
      </div>
    </div>
  </body>
</html>
