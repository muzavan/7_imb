<?php
  use App\Bangunan;
?>
@extends('admin.app')

@section('content')
      
      @if($block['bangunans'])
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> IMB</h3>

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Semua Izin</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th class="hidden-phone">NIK</th>
                                  <th>Email</th>
                                  <th>Nama</th>
                                  <th>Jenis</th>
                                  <th class="hidden-phone">ID Lokasi</th>
                                  <th>Dokumen</th>
                                  <th>Status</th>
                                  <th></th>
                              </tr>
                              </thead>

                              <tbody>
                              <?php
                                  foreach ($block['bangunans'] as $bangunan) {
                              ?>
                              <tr>
                                  <td>{{$bangunan->id}}</td>
                                  <td>{{$bangunan->nik}}</td>
                                  <td>{{$bangunan->email}}</td>
                                  <td>{{$bangunan->nama}}</td>
                                  <td>{{$bangunan->jenis}}</td>
                                  <td>{{$bangunan->id_lokasi}}</td>
                                  <td><a href='{{$bangunan->dokumen}}'>Dokumen Teknis</a></td>
                                  <td>{{$bangunan->status}}</td>
                                  @if($bangunan->status==Bangunan::getStatusBangunan()['0'])
                                  <td>
                                      <a href='imb/setuju/{{$bangunan->id}}'><button class="btn btn-success btn-xs"><i class="fa fa-check">Setujui</i></button></a>
                                      <a href='imb/sebelumTolak/{{$bangunan->id}}'><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o ">Tolak</i></button></a>
                                  </td>
                                  @endif
                              </tr>
                              <?php
                                  }
                                ?>
                              </tbody>
                          </table>

                              
                              <?php
                                  echo "<center>".$block['bangunans']->render()."</center>";
                              ?>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      @else
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> IMB</h3>

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Semua Izin</h4>

                            Tidak ada permohonan IMB yang terdaftar.

                            </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      @endif

@stop
