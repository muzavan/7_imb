@extends('app')

@section('content')
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => '/pemohons']) !!}
			<div class='form-group'>
				{!! Form::label('nama','Nama:') !!}
				{!! Form::text('nama',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('nik','NIK:') !!}
				{!! Form::text('nik',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('alamat','Alamat:') !!}
				{!! Form::textarea('alamat',null,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('email','Email:') !!}
				{!! Form::email('email','pemohon@pemohon.com',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::submit('Tambah Pemohon',['class' => 'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class='col-md-3'>
		</div>
	</div>
@stop