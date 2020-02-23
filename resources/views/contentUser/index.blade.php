@extends('templateUser/master')
@section('tittle','Home')
@section('content')
<!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <h1>Welcome to Simaksi</h1>
      <h2>Surat Izin Masuk Kawasan Konservasi Gunung Merbabu</h2>
        <div class="form-row">
          <div class="col-9">
            <input type="text" class="form-control mt-3" placeholder="No. Simaksi" id="kd_simaksi" required>
          </div>
          <div class="col-3">
            {{-- <a href="#about" class="btn-get-started">Get Started</a> --}}
            <a class="btn-get-started" data-toggle="modal" data-target="#exampleModal" onclick="detailSimaksi()">Search</a>
          </div>
        </div>
    </div>
  </section><!-- #hero -->

  <main id="main">

  {{-- MODAL --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="id_simaksi" style="color:white"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6" id="tanggal_naik"></div>
          <div class="col-6 text-right" id="tanggal_turun"><i></i></div>
        </div>
        <div class="row">
          <div class="mx-auto mt-3" id="jumlah_peserta"><i></i></div>
        </div>
        <div class="row">
              <div class="col-12">
                  <div class="card mt-2">
                      <div class="card-body">
                          <table class="table table-hover table-stripped table-bordered table-block table-responsive" id="detailTable">
                              <thead style="font-size: 12px;">
                                  <tr>
                                      <td>Nama Peserta</td>
                                      <td>No. Ktp</td>
                                      <td>Jenis Kelamin</td>
                                      <td>Tanggal Lahir</td>
                                      <td>Alamat</td>
                                      <td>No. Hp</td>
                                  </tr>
                              </thead>
                              <tbody style="font-size: 12px;"></tbody>
                              <tfoot style="font-size: 12px;">
                                  <tr>
                                      <td>Nama Peserta</td>
                                      <td>No. Ktp</td>
                                      <td>Jenis Kelamin</td>
                                      <td>Tanggal Lahir</td>
                                      <td>Alamat</td>
                                      <td>No. Hp</td>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer bg-success">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
  <script>
    // $('#detailTable').DataTable();
    function detailSimaksi() {
        var id = $('#kd_simaksi').val();
        $.ajax({
            type : 'get',
            url : '{{url('/')}}/search/'+id,
            dataType : 'JSON',
            success : function(respon){
            // $('#exampleModal').modal('show');
            $('#id_simaksi').text(id);
            $('#tanggal_naik').text('Tanggal Naik : '+respon[0].tanggal_naik);
            $('#tanggal_turun').text('Tanggal Naik : '+respon[0].tanggal_turun);
            $('#jumlah_peserta').text('Jumlah Peserta '+respon[0].jumlah_peserta);
            $('#detailTable').DataTable({
                destroy: true,
                data : respon,
                columns : [
                  {data: "nama_peserta"},
                  {data: "no_ktp"},
                  {data: "jenis_kelamin"},
                  {data: "tanggal_lahir"},
                  {data: "alamat"},
                  {data: "no_tlpn"},
                ]
            });
            
            }
        })
    }
  </script>
  @if(session('status'))
  <script>
      Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '{{session("status")}}',
      footer: '<a href>Why do I have this issue?</a>'
      })
  </script>
  @elseif(session('berhasil'))
  <script>
      Swal.fire(
          'Good job!',
          '{{session('berhasil')}}',
          'success'
          )
  </script>
  @endif
@endsection
