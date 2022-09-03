@extends('layouts.front')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <div class="carousel-inner" role="listbox">

      <!-- Slide -->
      @foreach($sliders as $key => $slider)
      <div class="carousel-item @if($key == 0) active @endif" style="background-image: url({{url($slider->image)}});">
        <div class="carousel-container">
          <div class="carousel-content animate__animated animate__fadeInUp">
            <h2>{{ $slider->title }}</h2>
            <p>{!! $slider->description !!}</p>
            @if($slider->url != null)
            <div class="text-center"><a href="{{ url($slider->url) }}" class="btn-get-started">Pelajari Selengkapnya</a></div>
            @endif
          </div>
        </div>
      </div>
      @endforeach

    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

  </div>
</section><!-- End Hero -->

<main id="main">
  <!-- ======= Services Section ======= -->
  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <h3>Kabar Terkini</h3>

      <div class="bootstrap snippets bootdey row">
          @foreach($allNews as $news)
          <div class="col-sm-4">
            <div class="widget single-news">
              <div class="image">
                <img src="{{ env('URL_API_NEWS', 'http://localhost/pembaharuan') }}/public/images/{{ $news->image }}" class="img-responsive">
                <span class="gradient"></span>
              </div>
              <div class="details">
                <div class="category"><a href="">{{ $news->category->name }}</a></div>
                <h3><a href="{{ url('/berita/'.$news->category->slug.'/'.$news->slug) }}">{{ $news->title }}</a></h3>
                <time>{{ $news->created_at }}</time>
              </div>
            </div>
          </div>
          @endforeach
      </div>

    </div>
  </section><!-- End Services Section -->

</main><!-- End #main -->
@stop

@section('style')
<style type="text/css">
  .widget.single-news {
      margin-bottom: 20px;
      position: relative;
  }

  .widget.single-news .image img {
      display: block;
      width: 100%;
  }

  .widget.single-news .image .gradient {
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgeG1sbnM9Imh0d…IxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjbGVzc2hhdC1nZW5lcmF0ZWQpIiAvPjwvc3ZnPg==);
      background-image: -webkit-linear-gradient(bottom, #000000 0%, rgba(0, 0, 0, 0.05) 100%);
      background-image: -moz-linear-gradient(bottom, #000000 0%, rgba(0, 0, 0, 0.05) 100%);
      background-image: -o-linear-gradient(bottom, #000000 0%, rgba(0, 0, 0, 0.05) 100%);
      background-image: linear-gradient(to top, #000000 0%, rgba(0, 0, 0, 0.05) 100%);
  }

  .widget.single-news .details {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 20px;
  }

  .widget.single-news .details .category {
      font-size: 11px;
      text-transform: uppercase;
      margin-bottom: 10px;
  }

  .widget.single-news .details .category a {
      color: #fff;
      zoom: 1;
      -webkit-opacity: 0.5;
      -moz-opacity: 0.5;
      opacity: 0.5;
      -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
      filter: alpha(opacity=50);
  }

  .widget.single-news .details h3 {
      margin: 0;
      padding: 0;
      margin-bottom: 10px;
      font-size: 19px;
  }

  .widget.single-news .details h3 a {
      color: #fff;
      zoom: 1;
      -webkit-opacity: 0.8;
      -moz-opacity: 0.8;
      opacity: 0.8;
      -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
      filter: alpha(opacity=80);
  }

  .widget.single-news .details:hover time {
      position: relative;
      display: block;
      color: #fff;
      font-size: 13px;
      margin-bottom: -20px;
      -webkit-transition: all 350ms cubic-bezier(0.175, 0.885, 0.320, 1.275);
      -moz-transition: all 350ms cubic-bezier(0.175, 0.885, 0.320, 1.275);
      -o-transition: all 350ms cubic-bezier(0.175, 0.885, 0.320, 1.275);
      transition: all 350ms cubic-bezier(0.175, 0.885, 0.320, 1.275);
      zoom: 1;
      -webkit-opacity: 0;
      -moz-opacity: 0;
      opacity: 0;
      -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
      filter: alpha(opacity=0);
  }
</style>
@stop