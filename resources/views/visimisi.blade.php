@extends('layouts.front')

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Visi Misi</h2>
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li>Visi Misi</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= About Us Section ======= -->
  <section id="about-us" class="about-us">
    <div class="container" data-aos="fade-up">

      <div class="row content">
        <div class="col-lg-6" data-aos="fade-right">
          <h2>Visi Misi HMI CAKABA {{ ' periode '.$tempLetter->periode ?? ' ' }}</h2>
          <b>{!! $about->visi !!}</b>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
          {!! $about->misi !!}
        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->

</main><!-- End #main -->
@stop