@if($informasi)
	<h2>{{$informasi->judul}}</h2>
	<p>{{$informasi->konten}}</p>
@else
	Informasi tidak ada/dapat ditampilkan
@endif