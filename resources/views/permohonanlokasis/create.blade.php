@extends('app')

@section('content')
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => "/permohonanlokasis"]) !!}
			<div class='form-group'>
				{!! Form::label('id_pemohon','ID Pemohon:') !!}
				{!! Form::text('id_pemohon',null,['class' => 'form-control']) !!}
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