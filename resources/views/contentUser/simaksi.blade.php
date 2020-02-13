@extends('templateUser/master')
@section('tittle','Home')
@section('content')

<main id="main">
<!--==========================
      Services Section
    ============================-->
    <section id="services">
        <div class="container wow fadeIn">
          <div class="section-header">
            <h3 class="section-title">SIMAKSI</h3>
            <p class="section-description">Pilih Menu Simaksi Yang Dibutuhkan</p>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
              <div class="box">
                <div class="icon"><a href="{{route('daftar')}}"><i class="fa fa-file"></i></a></div>
                <h4 class="title"><a href="{{route('daftar')}}" >Daftar Simaksi</a></h4>
                <p class="description">Daftarkan Diri Anda Untuk Mendapatkan Simaksi Secara Online</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
              <div class="box">
                <div class="icon"><a href="{{route('BayarSimaksi')}}"><i class="fa fa-money"></i></a></div>
                <h4 class="title"><a href="{{route('BayarSimaksi')}}">Pembayaran Simaksi</a></h4>
                <p class="description">Lakukan Pembayaran Simaksi Secara Online</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
              <div class="box">
                <div class="icon"><a href="{{route('History')}}"><i class="fa fa-history"></i></a></div>
                <h4 class="title"><a href="{{route('History')}}">History Simaksi</a></h4>
                <p class="description">Daftar history simaksi Anda</p>
              </div>
            </div>
  
            {{-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
              <div class="box">
                <div class="icon"><a href=""><i class="fa fa-photo"></i></a></div>
                <h4 class="title"><a href="">Magni Dolores</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
              <div class="box">
                <div class="icon"><a href=""><i class="fa fa-road"></i></a></div>
                <h4 class="title"><a href="">Nemo Enim</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
              <div class="box">
                <div class="icon"><a href=""><i class="fa fa-shopping-bag"></i></a></div>
                <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
              </div>
            </div>
          </div> --}}
  
        </div>
      </section><!-- #services -->
</main>

@endsection