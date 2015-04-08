@extends('app')

@section('content')
	@if($pemilik)
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => "/pemiliks/pemilik/$pemilik->id/update"]) !!}
			<div class='form-group'>
				{!! Form::label('nama','Nama:') !!}
				{!! Form::text('nama',$pemilik->nama,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('alamat','Alamat:') !!}
				{!! Form::textarea('alamat',$pemilik->alamat,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('telepon','Telepon:') !!}
				{!! Form::text('telepon',$pemilik->telepon,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('fax','Fax:') !!}
				{!! Form::text('fax',$pemilik->fax,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('email','Email:') !!}
				{!! Form::email('email',$pemilik->email,['class' => 'form-control']) !!}
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