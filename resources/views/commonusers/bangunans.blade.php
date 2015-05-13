@extends('commonusers.app')

@section('sidebar')

@stop

@section('content')
  {!! Form::open(['url' => '/pengajuan-IMB' , 'class'=>'form-horizontal' , 'files'=>true]) !!}
      <div class='control-group'>
        <div class="controls"><h3>Form Permohonan Izin Mendirikan Bangunan</h3></div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('nama','Nama:') !!}</div>
        <div class="controls">{!! Form::text('nama','',['placeholder' => 'Nama Bangunan', 'class' => 'span7']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('fungsi','Fungsi:') !!}</div>
        <div class="controls">{!! Form::select('fungsi', array('1' => 'Lapangan Olahraga', '2' => 'Kolam Renang', '3' => 'Rumah'), '1',['class' => 'span7']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('alamat','Alamat:') !!}</div>
        <div class="controls">{!! Form::textarea('lokasi','',['placeholder' => 'Alamat Lengkap Bangunan', 'class' => 'span7','rows' => '3']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('password','Kode lokasi:') !!}</div>
        <div class="controls">{!! Form::text('password','',['class' => 'span7']) !!}</div>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('jenis','Jenis:') !!}</div>
        <div class="controls">{!! Form::select('jenis', array('1' => 'Permanen', '2' => 'Semi-Permanen', '3' => 'Sementara'), 'Permanen',['class' => 'span7']) !!}</div>
>>>>>>> Stashed changes
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('jenis','Jenis:') !!}</div>
        <div class="controls">{!! Form::select('jenis', array('1' => 'Permanen', '2' => 'Semi-Permanen', '3' => 'Sementara'), 'Permanen',['class' => 'span7']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('dokumen','Dokumen Teknis:') !!}</div>
        <div class="controls">{!! Form::file('dokumen',['class' => 'span7']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::submit('Tambah Permohonan Bangunan',['class' => 'btn btn-primary form-control']) !!}</div>
      </div>
      {!! Form::close() !!}
@stop