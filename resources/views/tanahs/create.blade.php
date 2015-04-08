@extends('app')

@section('content')
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open() !!}
			<div class='form-group'>
				{!! Form::label('judul','Judul:') !!}
				{!! Form::text('judul',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('konten','Konten:') !!}
				{!! Form::textarea('konten',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('referensi','Referensi:') !!}
				{!! Form::textarea('referensi','(Optional)',['class' => 'form-control','rows' => '4']) !!}
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