@extends('layouts.front')

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Kontak</h2>
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li>Kontak</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Contact Section ======= -->
  <div class="map-section">
    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15842.582798093212!2d107.7025023!3d-6.9328814!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c32a2449d2fd%3A0x581d8ca8f0d918f7!2spusat%20kegiatan%20(PUSGIT)%20HmI%20CAKABA!5e0!3m2!1sen!2sid!4v1652038315641!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
  </div>

  <section id="contact" class="contact">
    <div class="container">

      <div class="row justify-content-center" data-aos="fade-up">

        <div class="col-lg-10">

          <div class="info-wrap">
            <div class="row">
              <div class="col-lg-4 info">
                <i class="bi bi-geo-alt"></i>
                <h4>Alamat:</h4>
                <p>{{ $social->address }}</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>{{ $social->email }}</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="bi bi-phone"></i>
                <h4>HP/Whatsapp:</h4>
                <p>{{ $social->contact }}</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
@stop