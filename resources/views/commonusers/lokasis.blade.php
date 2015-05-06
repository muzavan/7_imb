@extends('commonusers.app')

@section('sidebar')

@stop

@section('content')
      {!! Form::open(['url' => '/home/pengajuan-lokasi' , 'class'=>'form-horizontal', 'files'=>true]) !!}
      <div class='control-group'>
        <div class="controls"><h3>Form Permohonan Izin Lokasi</h3></div>
      </div>

      <div class='control-group'>
        <div class="controls">{!! Form::label('nama','Nama:') !!}</div>
        <div class="controls">{!! Form::text('nama','(Nama Lokasi)',['class' => 'span8']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('fungsi','Fungsi:') !!}</div>
        <div class="controls">{!! Form::select('fungsi', array('1' => 'Lapangan Olahraga', '2' => 'Kolam Renang', '3' => 'Rumah'), '1',['class' => 'span8']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('lokasi','Lokasi:') !!}</div>
        <div class="controls">{!! Form::textarea('lokasi','Alamat Lengkap Bangunan',['class' => 'span8','rows' => '3']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('jenis','Jenis:') !!}</div>
        <div class="controls">{!! Form::select('jenis', array('1' => 'Permanen', '2' => 'Semi-Permanen', '3' => 'Sementara'), 'Permanen',['class' => 'span8']) !!}</div>
      </div>
      <div class='control-group' hidden=true>
        <div class="controls">{!! Form::label('jumlah_lantai','Jumlah Lantai:') !!}</div>
        <div class="controls">{!! Form::selectRange('jumlah_lantai', 1, 20,['class' => 'span8']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('dokumen','Dokumen Teknis:') !!}</div>
        <div class="controls">{!! Form::file('dokumen',['class' => 'span8']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::submit('Tambah Permohonan Lokasi',['class' => 'btn btn-primary form-control']) !!}</div>
      </div>
      {!! Form::close() !!}
@stop