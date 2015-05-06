@extends('admin.app')

@section('content')

      @if($block['pengaduans'])
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Pengaduan</h3>

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i>{{$block['message']}}</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th>Nama</th>
                                  <th>Isi</th>
                                  <th>Tanggal</th>
                              </tr>
                              </thead>

                              <tbody>
                              <?php
                                  foreach ($block['pengaduans'] as $pengaduan) {
                              ?>
                              <tr>
                                  <td>{{$pengaduan->nama}}</td>
                                  <td>{{$pengaduan->isi}}</td>
                                  <td>{{$pengaduan->updated_at}}</td>
                              </tr>
                              <?php
                                  }
                                ?>
                              </tbody>
                          </table>

                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      @else
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Pengaduan</h3>

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i>{{$block['message']}}</h4>

                            Tidak ada pengaduan yang terdaftar.

                            </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      @endif
@stop