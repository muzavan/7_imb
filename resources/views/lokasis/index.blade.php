@extends('app')

@section('content')
  @if($block['message'])
    <div class='alert-success'>
      {{ $block['message'] }}
    </div>
  @endif
  @if($block['lokasis']->count())
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>id</th>
                  <th>nama</th>
                  <th>fungsi</th>
                  <th>lokasi</th>
                  <th>jenis</th>
                  <th>dokumen</th>
                  <th>edit</th>
                  <th>delete</th>
                  
              </tr>
          </thead>

          <tbody>
              @foreach ($block['lokasis'] as $lokasi)
                  <tr>
                        <td>{{ $lokasi->id }}</td>
                        <td>{{ $lokasi->nama }}</td>
                        <td>{{ $lokasi->fungsi }}</td>
                        <td>{{ $lokasi->lokasi }}</td>
                        <td>{{ $lokasi->jenis }}</td>
                        <td>{{ $lokasi->dokumen }}</td>                      
                        <td> <a href='lokasis/lokasi/{{$lokasi->id}}/edit'>Edit</a> </td>
                        <td> <a href='lokasis/lokasi/{{$lokasi->id}}/delete'>Delete</a> </td>
                  </tr>
              @endforeach
                
          </tbody>
        
      </table>
  @else
      Tidak ada Informasi yang Bisa Ditampilkan
  @endif
@stop