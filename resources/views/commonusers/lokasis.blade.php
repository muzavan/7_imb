@extends('commonusers.app')

@section('sidebar')

@stop

@section('content')
      {!! Form::open(['url' => '/home/pengajuan-lokasi' , 'class'=>'form-horizontal', 'files'=>true]) !!}
      <div class='control-group'>
        <div class="controls"><h3>Form Permohonan Izin Lokasi</h3></div>
      </div>

      <div class='control-group'>
        <div class="controls">{!! Form::label('email','Email:') !!}</div>
        <div class="controls">{!! Form::text('email','',['class' => 'span8']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('alamat','Alamat:') !!}</div>
        <div class="controls">{!! Form::textarea('alamat','',['class' => 'span8', 'rows' => '3']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('luas','Luas:') !!}</div>
        <div class="controls">{!! Form::text('luas','',['class' => 'span8']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('kelurahan','Kelurahan:') !!}</div>
        <div class="controls">{!! Form::text('kelurahan','',['class' => 'span8']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('kecamatan','Kecamatan:') !!}</div>
        <div class="controls">{!! Form::text('kecamatan','',['class' => 'span8']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('dokumen','Dokumen Teknis:') !!}</div>
        <div class="controls">{!! Form::file('dokumen',['class' => 'span8']) !!}</div>
      </div>
      {!! Form::hidden('status', 'menunggu') !!}
      <div class='control-group'>
        <div class="controls">{!! Form::submit('Tambah Permohonan Lokasi',['class' => 'btn btn-primary form-control']) !!}</div>
      </div>
      {!! Form::close() !!}
@stop