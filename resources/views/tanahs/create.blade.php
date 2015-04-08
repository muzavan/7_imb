@extends('app')

@section('content')
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => "/tanahs"]) !!}
			<div class='form-group'>
				{!! Form::label('nama_pemilik','Nama Pemilik:') !!}
				{!! Form::text('nama_pemilik',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('luas','Luas:') !!}
				{!! Form::text('luas',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::submit('Tambah Tanah',['class' => 'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class='col-md-3'>
		</div>
	</div>
@stop