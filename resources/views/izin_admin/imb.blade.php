@extends('izin_admin.app')
<?php use App\Bangunan; ?>
@section('content')
      
      @if($block)
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
                                  <th><i class="fa fa-bullhorn"></i>ID</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>NIK</th>
                                  <th><i class="fa fa-bookmark"></i>Email</th>
                                  <th><i class=" fa fa-edit"></i>Nama</th>
                                  <th><i class="fa fa-bullhorn"></i>Jenis</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>ID Lokasi</th>
                                  <th><i class="fa fa-bookmark"></i>Dokumen</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
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
                                  echo "<center>".$block['bangunans']->render()."<c/enter>";
                              ?>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
      @endif

@stop
