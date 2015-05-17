@extends('commonusers.app')

@section('content')

<section id="main-content">
<section class="wrapper">


<section class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="span2 offset3">
                <img src="img/logo.png" class="img-responsive">
            </div>
            <div class="span4"><br>
                <h1 class="section-heading">Pengajuan Izin Membangun Online</h1>
            </div>
        </div>
    </div>
</section>

<header id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Carousel items -->
<div class="carousel-inner">
<div class="item active">
    <img src="img/imb.jpg" alt="">
    
    <div class="carousel-caption">
        <h2 class="carous">Izin Mendirikan Bangunan</h2>
      <h3 class="carous">Izin mendirikan bangunan di Kota Bandung</h3>
      <p><a href="#imb">Ajukan izin untuk mendirikan bangunan di sini</a></p>
    </div>
</div>
<div class="item">
    <img src="img/izinlokasi.jpg" alt="">
    <div class="carousel-caption">
        <h2 class="carous">Izin Lokasi</h2>
      <h3 class="carous">Izin lokasi di Kota Bandung</h3>
      <p><a href="#lokasi">Ajukan permohonan untuk izin lokasi di sini</a></p>
    </div>
</div>
<div class="item">
    <img src="img/tataruang.jpg" alt="">
    <div class="carousel-caption">
        <h2 class="carous">Tata Ruang</h2>
      <h3 class="carous">Tata ruang Kota Bandung</h3>
      <p><a href="#tataruang">Ajukan permohonan tata ruang di sini</a></p>
    </div>
</div>
</div>
<!-- Carousel nav -->
<a class="carousel-control left" href="#myCarousel" data-slide="prev">
&lsaquo;
</a>
<a class="carousel-control right" href="#myCarousel" data-slide="next">
&rsaquo;
</a>
</header>

<section class="bg-yellow" id="imb">
    <div class="container">
        <div class="row">
            <div class="span8 offset2"><br>
                <center><h1 class="title">Izin Mendirikan Bangunan</h1><br>
                    <p>Proses pengurusan IMB merupakan kelanjutan dari KRK, apakah bangunan tersebut termasuk Bangunan Herritage atau tidak, Peruntukan Bangunan apakah sesuai dengan rencana pemohon, apakah lokasi bangunan termasuk wilayah Bandung Utara atau tidak, berapa ketinggian bangunan yang diperbolehkan, disamping itu ada beberapa hal teknis yang perlu diperhatikan oleh pemohon agar dalam proses penerbitan IMB tidak ada kendala yang mengakibatkan keterlambatan sampai dengan 4 bulan bahkan 6 bulan juga belum selesai.</p>

                    <p>Unduh syarat pengajuan izin mendirikan bangunan: <a class="we" href="http://www.bandungkab.go.id/uploads/izin_mendirikan_bangunan_%28imb%29.pdf">http://www.bandungkab.go.id/uploads/izin_mendirikan_bangunan_%28imb%29.pdf</a></p>

                    <br><a href="/user/pengajuan-IMB" class="btn btn-sample btn-lg"><b>Ajukan Izin untuk Mendirikan Bangunan</b></a>
                </center>
            </div>
        </div>
    </div>
</section>

<section class="bg-primary" id="lokasi">
    <div class="container">
        <div class="row">
            <div class="span8 offset2"><br>
                <center><h1 class="title">Izin Lokasi</h1><br>
                    <p>Di negara-negara maju, bidang Izin Lokasi merupakan dunia yang menjanjikan. Tahun lalu saja, di Inggris, pendapatan dari industri ini mencapai US$660,473.07. Tidak seperti di Indonesia, hidup sebagai seorang penggiat Izin Lokasi merupakan mata pencaharian yang memadai dan dihormati oleh masyarakat.

                    Mengamati kondisi yang mengkhawatirkan dalam bidang Izin Lokasi di Indonesia saat ini, kita telah mengidentifikasi beberapa faktor permasalahan.

                    Sebenarnya, bakat-bakat dalam industri Izin Lokasi amat banyak. Hingga kini, sudah 75 orang diberangkatkan ke berbagai konferensi luar negeri, membuktikan bahwa Indonesia tidak kalah dengan banyak negara asing.

                    Namun, cukup disayangkan, para pelaku dalam industri maupun komunitas Izin Lokasi seringkali berdiri sendiri-sendiri dan kurang peka terhadap pentingnya kolaborasi demi membangun infrastruktur berkelanjutan. Padahal, ekosistem inilah yang dibutuhkan dunia Izin Lokasi Indonesia untuk benar-benar maju.</p>

                    <p>Unduh syarat pengajuan izin lokasi: <a class="we" href="http://www.bandung.go.id/images/download/1_ijin_lokasi.pdf">http://www.bandung.go.id/images/download/1_ijin_lokasi.pdf</a></p>

                    <br><a href="/user/pengajuan-lokasi" class="btn btn-sample-blue btn-lg"><b>Ajukan Izin untuk Lokasi</b></a>
                </center>
            </div>
        </div>
    </div>
</section>

<section class="bg-yellow-bottom" id="tataruang">
    <div class="container">
        <div class="row">
            <div class="span8 offset2"><br>
                <center><h1 class="title">Tata Ruang</h1><br>
                    <p>Sebagai sebuah komunitas yang peduli terhadap perkembangan bisnis Tata Ruang Indonesia, kami percaya bahwa yang terpenting adalah mengenalkan beragam kisah sukses Tata Ruang pada masyarakat yang bertujuan untuk meningkatkan motivasi masyarakat dalam Tata Ruang serta memformulasikan rangka kerja yang terstruktur dan dapat diukur.

                    Selain itu, para kreator lokal dan para pelaku industri hendaknya bekerjasama lebih keras untuk mengembangkan platform terbuka di mana seluruh para pemangku kepentingan dapat berkomunikasi secara terbuka mengenai tantangan yang dihadapi.</p>

                    <br><a href="/user/tataruang/peta" class="btn btn-sample btn-lg"><b>Lihat Tata Ruang Bandung</b></a>
                </center>
            </div>
        </div>
    </div>
</section>

</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->

@stop