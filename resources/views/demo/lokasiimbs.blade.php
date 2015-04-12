@extends('demo.app')

@section('sidebar')
  <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>Tahapan</th>
              </tr>
          </thead>

          <tbody>
             <tr ><td>Izin Bangunan</td></tr>
             <tr><td>Izin Pemilik</td></tr>
             <tr><td>Izin Tanah</td></tr>
             <tr class='active'><td>Izin Lokasi</td></tr>
          </tbody>
        
      </table>
@stop

@section('content')
      {!! Form::open(['url' => '/demo/lokasiimbs' , 'files'=>true]) !!}
      <div class='form-group'>
        {!! Form::label('nama','Nama:') !!}
        {!! Form::text('nama','(Nama Lokasi)',['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('fungsi','Fungsi:') !!}
        {!! Form::select('fungsi', array('1' => 'Lapangan Olahraga', '2' => 'Kolam Renang', '3' => 'Rumah'), '1',['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('lokasi','Lokasi:') !!}
        {!! Form::textarea('lokasi','Alamat Lengkap Bangunan',['class' => 'form-control','rows' => '3']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('jenis','Jenis:') !!}
        {!! Form::select('jenis', array('1' => 'Permanen', '2' => 'Semi-Permanen', '3' => 'Sementara'), 'Permanen',['class' => 'form-control']) !!}
      </div>
      <div class='form-group' hidden=true>
        {!! Form::label('jumlah_lantai','Jumlah Lantai:') !!}
        {!! Form::selectRange('jumlah_lantai', 1, 20,['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('dokumen','Dokumen Teknis:') !!}
        {!! Form::file('dokumen',['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::submit('Tambah Permohonan Lokasi',['class' => 'btn btn-primary form-control']) !!}
      </div>
      {!! Form::close() !!}
@stop