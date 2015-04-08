@if($lokasi)
	<h2>{{$lokasi->judul}}</h2>
	<p>{{$lokasi->nama}}</p>
	<p>{{$lokasi->alamat}}</p>
@else
	Informasi tidak ada/dapat ditampilkan
@endif