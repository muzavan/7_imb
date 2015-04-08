@if($pengaduan)
	<h2>{{$pengaduan->nama}}</h2>
	<h5>Kategori : {{$pengaduan->jenis}}</h5>
	<p>{{$pengaduan->isi}}</p>
@else
	Informasi tidak ada/dapat ditampilkan
@endif