@if ($informasis->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>judul</th>
                <th>konten</th>
                <th>referensi</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($informasis as $informasi)
                <tr>
                      <td>{{ $informasi->id }}</td>
                      <td>{{ $informasi->judul }}</td>
                      <td>{{ $informasi->konten }}</td>
                      <td>{{ $informasi->referensi }}</td>
                      <td> <a href='informasis/informasi/{{$informasi->id}}/edit'>Edit</a> </td>
                      <td> <a href='informasis/informasi/{{$informasi->id}}/delete'>Delete</a> </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    Tidak ada Informasi yang Bisa Ditampilkan
@endif