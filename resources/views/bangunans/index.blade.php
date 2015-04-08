@extends('app')

@section('content')
  @if($block['message'])
    <div class='alert-success'>
      {{ $block['message'] }}
    </div>
  @endif
  @if($block['bangunans']->count())
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>id</th>
                  <th>nama</th>
                  <th>fungsi</th>
                  <th>lokasi</th>
                  <th>jenis</th>
                  <th>jumlah_lantai</th>
                  <th>dokumen</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>

          <tbody>
              @foreach ($block['bangunans'] as $bangunan)
                  <tr>
                        <td>{{ $bangunan->id }}</td>
                        <td>{{ $bangunan->nama }}</td>
                        <td>{{ $bangunan->fungsi }}</td>
                        <td>{{ $bangunan->alamat }}</td>
                        <td>{{ $bangunan->jenis }}</td>
                        <td>{{ $bangunan->jumlah_lantai }}</td>
                        <td>{{ $bangunan->dokumen }}</td>
                        <td> <a href='bangunans/bangunan/{{$bangunan->id}}/edit'>Edit</a> </td>
                        <td> <a href='bangunans/bangunan/{{$bangunan->id}}/delete'>Delete</a> </td>
                  </tr>
              @endforeach
                
          </tbody>
        
      </table>
  @else
      Tidak ada Informasi yang Bisa Ditampilkan
  @endif
@stop