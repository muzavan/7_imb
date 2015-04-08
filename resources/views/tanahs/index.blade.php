@extends('app')

@section('content')
  @if($block['message'])
    <div class='alert-success'>
      {{ $block['message'] }}
    </div>
  @endif
  @if($block['tanahs']->count())
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>id</th>
                  <th>nama_pemilik</th>
                  <th>luas</th>
                  <th>status_hak</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>

          <tbody>
              @foreach ($block['tanahs'] as $tanah)
                  <tr>
                        <td>{{ $tanah->id }}</td>
                        <td>{{ $tanah->nama_pemilik }}</td>
                        <td>{{ $tanah->luas }}</td>
                        <td>{{ $tanah->status_hak }}</td>
                        <td> <a href='tanahs/tanah/{{$tanah->id}}/edit'>Edit</a> </td>
                        <td> <a href='tanahs/tanah/{{$tanah->id}}/delete'>Delete</a> </td>
                  </tr>
              @endforeach
                
          </tbody>
        
      </table>
  @else
      Tidak ada Informasi yang Bisa Ditampilkan
  @endif
@stop