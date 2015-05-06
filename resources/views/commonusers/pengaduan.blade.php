@extends('commonusers.app')

@section('content')
@if($block['message'])
<div class='alert-success'>
{{ $block['message'] }}
</div>
@endif
  {!! Form::open(['url' => '/pengaduan' , 'class'=>'form-horizontal' , 'files'=>true]) !!}
      <div class='control-group'>
        <div class="controls"><h3>Form Pengaduan</h3></div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('nama','Nama:') !!}</div>
        <div class="controls">{!! Form::text('nama',null,['required', 'class' => 'span9']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('isi','Isi:') !!}</div>
        <div class="controls">{!! Form::textarea('isi',null,['required', 'class' => 'span9']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('jenis','Kategori Pengaduan:') !!}</div>
        <div class="controls">{!! Form::select('jenis',['1'=>'Izin Mendirikan Bangunan', '2'=>'Izin Lokasi', '3'=>'Tata Ruang'],'1',['class' => 'form-control']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::submit('Kirim Pengaduan',['class' => 'btn btn-primary form-control']) !!}</div>
      </div>
      {!! Form::close() !!}
@stop