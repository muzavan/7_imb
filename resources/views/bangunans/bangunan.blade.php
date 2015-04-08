@if($bangunan)
	<h2>{{$bangunan->judul}}</h2>
	<p>{{$bangunan->konten}}</p>
@else
	Informasi tidak ada/dapat ditampilkan
@endif