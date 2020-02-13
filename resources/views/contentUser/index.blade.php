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
      <form>
        <div class="form-row">
          <div class="col-9">
            <input type="text" class="form-control mt-3" placeholder="No. Simaksi">
          </div>
          <div class="col-3">
            {{-- <a href="#about" class="btn-get-started">Get Started</a> --}}
            <a href="#about" class="btn-get-started" type="submit">Search</a>
          </div>
        </div>
      </form>
    </div>
  </section><!-- #hero -->

  <main id="main">
@endsection