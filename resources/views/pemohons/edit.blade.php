@extends('app')

@section('content')
	@if($pemohon)
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => "/pemohons/pemohon/$pemohon->id/update"]) !!}
			<div class='form-group'>
				{!! Form::label('nama','Nama:') !!}
				{!! Form::text('nama',$pemohon->nama,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('nik','NIK:') !!}
				{!! Form::text('nik',$pemohon->nik,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('alamat','Alamat:') !!}
				{!! Form::textarea('alamat',$pemohon->alamat,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('email','Email:') !!}
				{!! Form::email('email',$pemohon->email,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::submit('Ubah Data Pemilik',['class' => 'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class='col-md-3'>
		</div>
	</div>
	@else

	@endif
@stop