<?php
use App\Bangunan;
?>
@extends('app')

@section('content')
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => '/home/pengajuan-IMB' , 'files'=>true]) !!}
			<div class='form-group'>
				{!! Form::label('email','Email:') !!}
				{!! Form::email('email','mail@email.com',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('nama','Nama:') !!}
				{!! Form::text('nama','(Nama Bangunan)',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('jenis','Jenis:') !!}
				{!! Form::select('jenis',Bangunan::getOptionBangunan(), '1',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('id_lokasi','ID Lokasi:') !!}
				{!! Form::text('id_lokasi','No Surat Izin Lokasi',['class' => 'form-control','rows' => '3']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('password_lokasi','Password Lokasi:') !!}
				{!! Form::text('password_lokasi','Password Surat Izin Lokasi (dimiliki Pemilik Lokasi)',['class' => 'form-control','rows' => '3']) !!}
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