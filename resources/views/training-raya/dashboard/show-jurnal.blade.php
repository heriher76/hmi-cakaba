@extends('layouts.front')

@section('content')
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Lihat {{$tipe}}</h2>
      <ol>
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li>{{$tipe}}</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<section id="contact" class="contact">
  <div class="container">

    <div class="row justify-content-center" data-aos="fade-up">

      <div class="col-lg-10">

        <div class="info-wrap">
          <div class="row">
            <div class="col-lg-12 info">
                @if($tipe == 'jurnal')
                <iframe src="{{ url($jurnal->file_jurnal) }}" style="width:100%; height:100%;" frameborder="0"></iframe>
                @elseif($tipe == 'essay')
                <iframe src="{{ url($jurnal->file_essay) }}" style="width:100%; height:100%;" frameborder="0"></iframe>
                @elseif($tipe == 'sindikat wajib')
                <iframe src="{{ url($jurnal->file_sindikat) }}" style="width:100%; height:100%;" frameborder="0"></iframe>
                @elseif($tipe == 'sindikat pilihan')
                <iframe src="{{ url($jurnal->file_sindikat_pilihan) }}" style="width:100%; height:100%;" frameborder="0"></iframe>
                @endif
            </div>
          </div>
          <hr>
            <center>
                <h3>
                  @if($tipe == 'jurnal')
                  {{ $jurnal->judul_jurnal }}
                  @elseif($tipe == 'essay')
                  {{ $jurnal->judul_essay }}
                  @elseif($tipe == 'sindikat wajib')
                  {{ $jurnal->judul_sindikat }}
                  @elseif($tipe == 'sindikat pilihan')
                  {{ $jurnal->judul_sindikat_pilihan }}
                  @endif
                </h3>
                <b>{{ $jurnal->name }}</b>
            </center>
            <hr>
            <h4>Komentar</h4>
            @foreach($list_komentar as $komentar)
            @php $user_komentar = \DB::table('users')->where('id', $komentar->user_komentar_id)->first(); @endphp
            <div class="media mt-3">
                <img src="http://cdn.onlinewebfonts.com/svg/img_212716.png" class="mr-3" alt="profile-photo" style="width: 3vw;">
                <div class="media-body">
                    <b class="mt-0">{{ $user_komentar->name }}</b>
                    <br>
                    {{ $komentar->komentar }}
                    <p><a href="#">{{ \Carbon\Carbon::parse($komentar->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y H:i') }}</a></p>
                </div>
            </div>
            @endforeach
        </div>

      </div>

    </div>

    <div class="row mt-5 justify-content-center">
      <div class="col-lg-10">
        <form action="{{ url('/dashboard-training/kirim-komentar/'.$jurnal->id) }}" method="post">
          @csrf
          <input type="hidden" name="tipe" value="{{$tipe}}">
          <div class="row">
          <div class="form-group mt-3">
            <textarea class="form-control" name="komentar" rows="5" placeholder="Tulis Komentar" required></textarea>
          </div>
          <div class="text-center"><button type="submit" class="btn btn-success">Kirim Komentar</button></div>
        </form>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->
@stop