@extends('app')

@section('content')
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => "/permohonanimbs"]) !!}
			<div class='form-group'>
				{!! Form::label('id_bangunan','ID Bangunan:') !!}
				{!! Form::text('id_bangunan',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('id_pemohon','ID Pemohon:') !!}
				{!! Form::text('id_pemohon',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('id_pemilik','ID Pemilik:') !!}
				{!! Form::text('id_pemilik',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('id_tanah','ID Tanah:') !!}
				{!! Form::text('id_tanah',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('id_lokasi','ID Lokasi:') !!}
				{!! Form::text('id_lokasi',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::submit('Tambah Informasi',['class' => 'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class='col-md-3'>
		</div>
	</div>
@stop