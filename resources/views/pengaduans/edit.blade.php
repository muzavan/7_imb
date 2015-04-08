@extends('app')

@section('content')
	@if($pengaduan)
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => "/pengaduans/pengaduan/$pengaduan->id/update"]) !!}
			<div class='form-group'>
				{!! Form::label('nama','Nama:') !!}
				{!! Form::text('nama',$pengaduan->nama,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('isi','Isi:') !!}
				{!! Form::textarea('isi',$pengaduan->isi,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('jenis','Kategori Pengaduan:') !!}
				{!! Form::select('jenis',['1'=>'Izin Mendirikan Bangunan', '2'=>'Izin Lokasi'],'1',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::submit('Ubah Pengaduan',['class' => 'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class='col-md-3'>
		</div>
	</div>
	@else

	@endif
@stop