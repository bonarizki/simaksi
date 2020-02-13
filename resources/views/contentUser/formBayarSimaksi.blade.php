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
                        <form method="post" action="{{route('ProsesBayarSimaksi')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Pendaftaran</label>
                                <input type="text" class="form-control @error('kd_pendaftaran') is-invalid @enderror" id="kd_pendaftaran" name="kd_pendaftaran" value="{{old('kd_pendaftaran')}}" placeholder="Kode Pendaftaran">
                                @error('tanggal_naik')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" class="form-control-file @error('file') is-invalid @enderror" name="file" id="file" value="{{old('file')}}" required>
                                @error('file')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                           
                            <div align="center">
                                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('footer')

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
@endif;
@endsection