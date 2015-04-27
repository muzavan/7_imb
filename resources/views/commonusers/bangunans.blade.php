@extends('commonusers.app')

@section('sidebar')
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>Tahapan</th>
              </tr>
          </thead>

          <tbody>
             <tr class='active'><td>Izin Bangunan</td></tr>
             <tr><td>Izin Pemilik</td></tr>
             <tr><td>Izin Tanah</td></tr>
             <tr><td>Izin Lokasi</td></tr>
          </tbody>
        
      </table>
@stop

@section('content')
  {!! Form::open(['url' => '/home/bangunans' , 'class'=>'form-horizontal' , 'files'=>true]) !!}
      <div class='control-group'>
        <div class="controls"><h3>Form Permohonan IMB - 1. Izin Bangunan</h3></div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('nama','Nama:') !!}</div>
        <div class="controls">{!! Form::text('nama','(Nama Bangunan)',['class' => 'span7']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('fungsi','Fungsi:') !!}</div>
        <div class="controls">{!! Form::select('fungsi', array('1' => 'Lapangan Olahraga', '2' => 'Kolam Renang', '3' => 'Rumah'), '1',['class' => 'span7']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('alamat','Alamat:') !!}</div>
        <div class="controls">{!! Form::textarea('lokasi','Alamat Lengkap Bangunan',['class' => 'span7','rows' => '3']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('jenis','Jenis:') !!}</div>
        <div class="controls">{!! Form::select('jenis', array('1' => 'Permanen', '2' => 'Semi-Permanen', '3' => 'Sementara'), 'Permanen',['class' => 'span7']) !!}</div>
      </div>
      <div class='control-group'>
        <div class="controls">{!! Form::label('jumlah_lantai','Jumlah Lantai:') !!}</div>
        <div class="controls">{!! Form::selectRange('jumlah_lantai', 1, 20,['class' => 'span7']) !!}</div>
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