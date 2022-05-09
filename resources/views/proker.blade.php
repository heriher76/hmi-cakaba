@extends('layouts.front')

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Program Kerja</h2>
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li>Program Kerja</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= About Us Section ======= -->
  <section id="about-us" class="about-us">
    <div class="container" data-aos="fade-up">

      <div class="row content">
        <div class="col-lg-12" data-aos="fade-right">
        	<center>
        		{!! $about->proker !!}
        	</center>
        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->

</main><!-- End #main -->
@stop