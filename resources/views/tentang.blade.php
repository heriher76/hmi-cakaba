@extends('layouts.front')

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>HMI CAKABA</h2>
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li>HMI CAKABA</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Our Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Tentang <strong>HMI CAKABA</strong></h2>
        <img src="{{ url($about->image) }}" style="width: 100px;">
        <br><br>
        <p>{!! $about->profile ?? '-' !!}</p>
      </div>

    </div>
  </section><!-- End Our Team Section -->

</main><!-- End #main -->
@stop