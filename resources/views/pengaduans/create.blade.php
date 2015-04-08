@extends('app')

@section('content')
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => "/pengaduans"]) !!}
			<div class='form-group'>
				{!! Form::label('nama','Nama:') !!}
				{!! Form::text('nama',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('isi','Isi:') !!}
				{!! Form::textarea('isi',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('jenis','Kategori Pengaduan:') !!}
				{!! Form::select('jenis',['1'=>'Izin Mendirikan Bangunan', '2'=>'Izin Lokasi'],'1',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::submit('Kirim Pengaduan',['class' => 'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class='col-md-3'>
		</div>
	</div>
@stop