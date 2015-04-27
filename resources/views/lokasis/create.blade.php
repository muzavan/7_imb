@extends('app')

@section('content')
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => '/home/pengajuan-lokasi' , 'files'=>true]) !!}
			<div class='form-group'>
				{!! Form::label('email','Email:') !!}
				{!! Form::email('email','mail@email.com',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('alamat','Alamat:') !!}
				{!! Form::text('alamat','(Alamat Lokasi)',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('luas','Luas:') !!}
				{!! Form::text('luas','Luas (dalam meter persegi)',['class' => 'form-control','rows' => '3']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('kelurahan','Kelurahan:') !!}
				{!! Form::text('kelurahan','Kelurahan',['class' => 'form-control','rows' => '3']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('kecamatan','Kecamatan:') !!}
				{!! Form::text('kecamatan','Kecamatan',['class' => 'form-control','rows' => '3']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('dokumen','Dokumen Teknis:') !!}
				{!! Form::file('dokumen',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::submit('Tambah Permohonan Bangunan',['class' => 'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class='col-md-3'>
		</div>
	</div>
@stop