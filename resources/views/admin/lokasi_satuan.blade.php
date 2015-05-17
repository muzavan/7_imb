@extends('admin.app')

@section('content')
      
      <!--main content start-->
              <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Lokasi</h3>

            <!-- COMPLEX TO DO LIST -->   
              <div class="row mt">
                
                  <div class="col-md-12">
                    
            <section class="task-panel tasks-widget">
              
              <div class="panel-body">
                <div class="task-content">
                  <div class="h2">NIK: {{$lokasi->nik}}</div>
                  <p><b>E-mail:</b> {{$lokasi->email}}</p>
                  <p><b>Alamat:</b> {{$lokasi->alamat}}</p>
                  <p><b>Luas:</b> {{$lokasi->luas}}</p>
                  <p><b>Kelurahan:</b> {{$lokasi->kelurahan}}</p>
                  <p><b>Kecamatan:</b> {{$lokasi->kecamatan}}</p>
                  <p><b>Dokumen:</b> <a href="{{$lokasi->dokumen}}">Dokumen teknis</a></p>
                  <p><b>Status:</b> {{$lokasi->status}}</p>
                  <p><b>Tanggal dibuat:</b> {{$lokasi->created_at}}</p>
                  <div class="pull-right">
                  <a href="/admin/lokasi/setuju/{{$lokasi->id}}" class="btn btn-sm btn-success">Terima</a>
                  <a href="/admin/lokasi/sebelumTolak/{{$lokasi->id}}" class="btn btn-sm btn-danger">Tolak</a>
                </div>
                </div>
              </div>
              
            </section>
                                                        </div><!-- /col-md-12-->
              </div><!-- /row -->          
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

@stop
