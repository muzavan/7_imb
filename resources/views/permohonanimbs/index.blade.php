@extends('app')

@section('content')
  @if($block['message'])
    <div class='alert-success'>
      {{ $block['message'] }}
    </div>
  @endif
  @if($block['permohonanimbs']->count())
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>id</th>
                  <th>id_bangunan</th>
                  <th>id_pemohon</th>
                  <th>id_pemilik</th>
                  <th>id_tanah</th>
                  <th>id_lokasi</th>
                  <th>status</th>
                  <th>code</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>

          <tbody>
              @foreach ($block['permohonanimbs'] as $permohonanimb)
                  <tr>
                        <td>{{ $permohonanimb->id }}</td>
                        <td>{{ $permohonanimb->id_bangunan }}</td>
                        <td>{{ $permohonanimb->id_pemohon }}</td>
                        <td>{{ $permohonanimb->id_pemilik }}</td>
                        <td>{{ $permohonanimb->id_tanah }}</td>
                        <td>{{ $permohonanimb->id_lokasi }}</td>
                        <td>{{ $permohonanimb->status }}</td>
                        <td>{{ $permohonanimb->code }}</td>
                        <td> <a href='permohonanimbs/permohonanimb/{{$permohonanimb->id}}/edit'>Edit</a> </td>
                        <td> <a href='permohonanimbs/permohonanimb/{{$permohonanimb->id}}/delete'>Delete</a> </td>
                  </tr>
              @endforeach
                
          </tbody>
        
      </table>
  @else
      Tidak ada Informasi yang Bisa Ditampilkan
  @endif
@stop