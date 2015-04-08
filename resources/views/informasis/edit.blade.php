@extends('app')

@section('content')
	@if($informasi)
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => "informasis/informasi/$informasi->id/update"]) !!}
			<div class='form-group'>
				{!! Form::label('judul','Judul:') !!}
				{!! Form::text('judul',$informasi->judul,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('konten','Konten:') !!}
				{!! Form::textarea('konten',$informasi->konten,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('referensi','Referensi:') !!}
				{!! Form::textarea('referensi',$informasi->referensi,['class' => 'form-control','rows' => '4']) !!}
			</div>
			<div class='form-group'>
				{!! Form::submit('Ubah Informasi',['class' => 'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class='col-md-3'>
		</div>
	</div>
	@else

	@endif
@stop