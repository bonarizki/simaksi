@extends('templateUser/master');
@section('tittle','Daftar Simaksi');

@section('content');
    <main>
        <div class="container">
            <section id="services">
                <div class="card">
                    <div class="card-header">
                      <h3>Form Daftar Simaksi</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('ProsesDaftar')}}">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Naik</label>
                                <input type="date" class="form-control @error('tanggal_naik') is-invalid @enderror" id="tanggal_naik" name="tanggal_naik" value="{{old('tanggal_naik')}}">
                                @error('tanggal_naik')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Turun</label>
                                <input type="date" class="form-control @error('tanggal_turun') is-invalid @enderror" name="tanggal_turun" id="tanggal_turun" value="{{old('tanggal_turun')}}">
                                @error('tanggal_turun')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jumlah Peserta</label>
                                <input type="text" class="form-control @error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" name="jumlah_peserta" value="{{old('jumlah_peserta')}}" onkeyup="form_peserta()">
                                @error('jumlah_peserta')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div id="data_peserta" hidden>
                                <hr>
                                    <div align="center" id="header_peserta"><h4>Biodata Peserta Peserta</h4></div>
                                <hr>
                                <div class="form-group">
                                    <label for="inputAddress2">Nama Peserta</label>
                                    <input type="text" class="form-control @error('nama_peserta') is-invalid @enderror" id="nama_peserta" name="nama_peserta[]" placeholder="Nama Lengkap">
                                    @error('nama_peserta')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">No KTP</label>
                                        <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" name="no_ktp[]">
                                        @error('no_ktp')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">No. Hp</label>
                                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp[]">
                                        @error('no_hp')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Jenis_Kelamin</label>
                                        <select id="jenis_kelamin" name="jenis_kelamin[]" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                            <option></option>
                                            <option value="laki-laki">Laki - Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Tanggal Lahir</label>
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir[]">
                                        @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Alamat</label>
                                    <textarea rows="5" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat[]"></textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    {{-- <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"> --}}
                                </div>
                                {{-- <button id="next" class=" btn btn-success">Next</button> --}}
                            </div>
                            <div id="copied_data_peserta"></div>
                            <button hidden type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('footer')
<script type="text/javascript">
    let total_peserta = $('#jumlah_peserta').val();
    if(total_peserta.length == ''){
        console.log('jamban')
    }else{
        form_peserta();
    }
    function form_peserta()
    {
        
        let total_peserta = $('#jumlah_peserta').val();
        for (let index = 1; index <= total_peserta; index++) {
            var clone = $('#data_peserta').clone().attr('id','data_peserta'+index);
            clone.appendTo('#copied_data_peserta');
            $('#data_peserta'+index).attr('hidden',false);
            $('#data_peserta'+index).attr('id',false);
            // $('#data_peserta'+index.h4).txt('Bioda Peserta'+ index);
            console.log('jamban'+index);            
        }
        $('#submit').attr('hidden',false);
        $('#data_peserta').remove();
    }
</script>
@if(session('status'))
    <script>
        Swal.fire(
            'Good job!',
            '{{session('status')}}',
            'success'
            )
    </script>
@endif;
@endsection