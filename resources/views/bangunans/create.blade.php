<?php
use App\Bangunan;
?>
@extends('app')

@section('content')
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => '/bangunans' , 'files'=>true]) !!}
			<div class='form-group'>
				{!! Form::label('nama','Nama:') !!}
				{!! Form::text('nama','(Nama Bangunan)',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('fungsi','Fungsi:') !!}
				{!! Form::select('fungsi',Bangunan::getOptionBangunan(), '1',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('alamat','Alamat:') !!}
				{!! Form::textarea('lokasi','Alamat Lengkap Bangunan',['class' => 'form-control','rows' => '3']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('jenis','Jenis:') !!}
				{!! Form::select('jenis', array('1' => 'Permanen', '2' => 'Semi-Permanen', '3' => 'Sementara'), 'Permanen',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('jumlah_lantai','Jumlah Lantai:') !!}
				{!! Form::selectRange('jumlah_lantai', 1, 20,['class' => 'form-control']) !!}
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