@extends('app')

@section('content')
  @if($block['message'])
    <div class='alert-success'>
      {{ $block['message'] }}
    </div>
  @endif
  @if($block['permohonanlokasis']->count())
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>id</th>
                  <th>id_pemohon</th>
                  <th>id_lokasi</th>
                  <th>status</th>
                  <th>code</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>

          <tbody>
              @foreach ($block['permohonanlokasis'] as $permohonanlokasi)
                  <tr>
                        <td>{{ $permohonanlokasi->id }}</td>
                        <td>{{ $permohonanlokasi->id_pemohon }}</td>
                        <td>{{ $permohonanlokasi->id_lokasi }}</td>
                        <td>{{ $permohonanlokasi->status }}</td>
                        <td>{{ $permohonanlokasi->code }}</td>
                        <td> <a href='permohonanlokasis/permohonanlokasi/{{$permohonanlokasi->id}}/edit'>Edit</a> </td>
                        <td> <a href='permohonanlokasis/permohonanlokasi/{{$permohonanlokasi->id}}/delete'>Delete</a> </td>
                  </tr>
              @endforeach
                
          </tbody>
        
      </table>
  @else
      Tidak ada Informasi yang Bisa Ditampilkan
  @endif
@stop