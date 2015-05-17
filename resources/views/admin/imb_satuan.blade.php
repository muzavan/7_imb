@extends('admin.app')

@section('content')
      
      <!--main content start-->
              <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Bangunan</h3>

            <!-- COMPLEX TO DO LIST -->   
              <div class="row mt">
                
                  <div class="col-md-12">
                    
            <section class="task-panel tasks-widget">
              
              <div class="panel-body">
                <div class="task-content">
                  <div class="h2">NIK: {{$bangunan->nik}}</div>
                  <p><b>E-mail:</b> {{$bangunan->email}}</p>
                  <p><b>Nama:</b> {{$bangunan->nama}}</p>
                  <p><b>Jenis:</b> {{$bangunan->jenis}}</p>
                  <p><b>Lokasi:</b> <a href="/admin/lokasi{{$bangunan->id_lokasi}}">Sini</a></p>
                  <p><b>Dokumen:</b> <a href="{{$bangunan->dokumen}}">Dokumen teknis</a></p>
                  <p><b>Status:</b> {{$bangunan->status}}</p>
                  <p><b>Tanggal dibuat:</b> {{$bangunan->created_at}}</p>
                  <div class="pull-right">
                  <a href="/admin/imb/setuju/{{$bangunan->id}}" class="btn btn-sm btn-success">Terima</a>
                  <a href="/admin/imb/sebelumTolak/{{$bangunan->id}}" class="btn btn-sm btn-danger">Tolak</a>
                </div>
                </div>
              </div>
              
            </section>
                                                        </div><!-- /col-md-12-->
              </div><!-- /row -->          
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

@stop
