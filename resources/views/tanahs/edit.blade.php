@extends('app')

@section('content')
	@if($tanah)
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => "/tanahs/tanah/$tanah->id/update"]) !!}
			<div class='form-group'>
				{!! Form::label('nama_pemilik','Nama Pemilik:') !!}
				{!! Form::text('nama_pemilik',$tanah->nama_pemilik,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('luas','Luas:') !!}
				{!! Form::text('luas',$tanah->luas,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('status_hak','Status:') !!}
				{!! Form::select('status_hak',['1' => 'Benar', '2'=>'Salah'],'2',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::submit('Tambah Tanah',['class' => 'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class='col-md-3'>
		</div>
	</div>
	@else

	@endif
@stop