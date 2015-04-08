@extends('app')

@section('content')
  @if($block['message'])
    <div class='alert-success'>
      {{ $block['message'] }}
    </div>
  @endif
  @if($block['pengaduans']->count())
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>id</th>
                  <th>nama</th>
                  <th>isi</th>
                  <th>kategori</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>

          <tbody>
              @foreach ($block['pengaduans'] as $pengaduan)
                  <tr>
                        <td>{{ $pengaduan->id }}</td>
                        <td>{{ $pengaduan->nama }}</td>
                        <td>{{ $pengaduan->isi }}</td>
                        <td>{{ $pengaduan->jenis }}</td>
                        <td> <a href='pengaduans/pengaduan/{{$pengaduan->id}}/edit'>Edit</a> </td>
                        <td> <a href='pengaduans/pengaduan/{{$pengaduan->id}}/delete'>Delete</a> </td>
                  </tr>
              @endforeach
                
          </tbody>
        
      </table>
  @else
      Tidak ada Informasi yang Bisa Ditampilkan
  @endif
@stop