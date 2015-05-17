<?php
  use App\Lokasi;
?>
@extends('admin.app')

@section('content')

<?php $judulweb = 'Semua Izin' ?>
@if($block['message'] == 'Disetujui')
  <?php $judulweb = 'Izin Diterima' ?>
@elseif($block['message'] == 'Ditolak')
  <?php $judulweb = 'Izin Ditolak' ?>
@elseif($block['message'] == 'Proses')
  <?php $judulweb = 'Izin Dalam Proses' ?>
@endif
      
      @if($block)
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Izin Lokasi</h3>

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i>{{$judulweb}}</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>ID</th>
                                  <th class="hidden-phone"></i>NIK</th>
                                  <th><i class="fa fa-bookmark"></i>Email</th>
                                  <th><i class=" fa fa-edit"></i>Alamat</th>
                                  <th><i class="fa fa-bullhorn"></i>Luas</th>
                                  <th class="hidden-phone">Kelurahan</th>
                                  <th class="hidden-phone">Kecamatan</th>
                                  <th><i class="fa fa-bookmark"></i>Dokumen</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>

                              <tbody>
                              <?php
                                  foreach ($block['lokasis'] as $lokasi) {
                              ?>
                              <tr>
                                  <td><a href="lokasi/{{$lokasi->id}}">{{$lokasi->id}}</a></td>
                                  <td>{{$lokasi->nik}}</td>
                                  <td>{{$lokasi->email}}</td>
                                  <td>{{$lokasi->alamat}}</td>
                                  <td>{{$lokasi->luas}}</td>
                                  <td>{{$lokasi->kelurahan}}</td>
                                  <td>{{$lokasi->kecamatan}}</td>
                                  <td><a href='{{$lokasi->dokumen}}'>Dokumen Teknis</a></td>
                                  <td>{{$lokasi->status}}</td>
                                  @if($lokasi->status==Lokasi::getStatusLokasi()['0'])
                                  <td>
                                      <a href='lokasi/setuju/{{$lokasi->id}}'><button class="btn btn-success btn-xs"><i class="fa fa-check">Setujui</i></button></a>
                                      <a href='lokasi/sebelumTolak/{{$lokasi->id}}'><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o ">Tolak</i></button></a>
                                  </td>
                                  @endif
                              </tr>
                             
                              <?php
                                  }
                              ?>
                              </tbody>
                          </table>
                         <?php echo "<center>".$block['lokasis']->render()."</center>"; ?>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
      @endif

@stop
