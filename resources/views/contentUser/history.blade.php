@extends('templateUser/master')
@section('tittle','History Simaksi')
@section('content')

<main id="main">
<!--==========================
      Services Section
    ============================-->
    <section id="services">
        <div class="container wow fadeIn">
            <div class="section-header">
                <h3 class="section-title">History SIMAKSI</h3>
                {{-- <p class="section-description">Pilih Menu Simaksi Yang Dibutuhkan</p> --}}
            </div>
            @if (count($data_simaksi)!=0)
                @foreach ($data_simaksi as $data)
                <div class="card mt-2">
                    <div class="card-header">Kode Simaksi : {{$data->id_simaksi}}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{date('Y/m/d',strtotime($data->tanggal_naik))}} - {{date('Y/m/d',strtotime($data->tanggal_turun))}}</h5>
                        <p class="card-text">Jumlah Peserta {{$data->jumlah_peserta}} orang<br>
                        status {{$status}}</p>
                        <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal" onclick="detailSimaksi('{{$data->id_simaksi}}')">Detail</button>
                    </div>
                </div>
                @endforeach
            @else
            <p class="text-danger" align="center">Anda Belum Memiliki History</p>
            @endif
        </div>
      </section><!-- #services -->
</main>

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
        function detailSimaksi(id) {
            $.ajax({
                type : 'get',
                url : '{{url('/')}}/DetailSimaksi/'+id,
                dataType : 'JSON',
                success : function(respon){
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
@endsection