@extends('layouts.front')

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Berita</h2>
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li>Berita</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">
          @if(!empty($allNews->data))
            @foreach($allNews->data as $news)

            <article class="entry">

              <div class="entry-img">
                <img src="{{ env('URL_API_NEWS', 'http://localhost/pembaharuan') }}/public/images/{{ $news->image }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{ url('/berita/'.$categorySlug.'/'.$news->slug) }}">{{ $news->title }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{ url('/berita/'.$categorySlug.'/'.$news->slug) }}">{{ $news->user_name }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="{{ url('/berita/'.$categorySlug.'/'.$news->slug) }}"><time datetime="{{ $news->created_at }}">{{ $news->created_at }}</time></a></li>
                  <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> -->
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  {!! \Str::limit($news->details,200) !!}
                </p>
                <div class="read-more">
                  <a href="{{ url('/berita/'.$categorySlug.'/'.$news->slug) }}">Baca Selanjutnya</a>
                </div>
              </div>

            </article><!-- End blog entry -->

            @endforeach
          @endif

          <div class="blog-pagination">
            <ul class="justify-content-center">
              @for ($i=1; $i <= $allNews->last_page; $i++) 
                  <li @if($allNews->current_page == $i) class="active" @endif><a href="{{ url('/berita/'.$categorySlug.'?page='.$i) }}">{{ $i }}</a></li>
              @endfor
            </ul>
          </div>

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">

            <h3 class="sidebar-title">Kategori</h3>
            <div class="sidebar-item categories">
              <ul>
              	@foreach($categories as $category)
                <li><a href="{{ url('berita/'.\Str::slug($category->name)) }}">{{ $category->name }} <span>></span></a></li>
                @endforeach
              </ul>
            </div><!-- End sidebar categories-->

            <h3 class="sidebar-title">Berita Populer</h3>
            <div class="sidebar-item recent-posts">

              @foreach($popularNews as $news)
              <div class="post-item clearfix">
                <img src="{{ env('URL_API_NEWS', 'http://localhost/pembaharuan') }}/public/images/{{ $news->image }}" alt="">
                <h4><a href="{{ url('/berita/'.$news->category->slug.'/'.$news->slug) }}">{{ $news->title }}</a></h4>
                <time datetime="{{ $news->created_at }}">{{ $news->created_at }}</time>
              </div>
              @endforeach

            </div><!-- End sidebar recent posts-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->
@stop