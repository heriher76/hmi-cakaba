@extends('layouts.admin')

@section('contents')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h5>{{ $jumlahKomisariat }}</h5>

                <p>Jumlah Komisariat</p>
              </div>
              <div class="icon">
                <i class="ion ion-home"></i>
              </div>
              <a href="{{ url('/eateries') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h5>{{ $jumlahKahmi }}</h5>

                <p>Jumlah KAHMI</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('/user-merchant') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h5>{{ $jumlahKader }}</h5>

                <p>Kader Terdaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('/user-apps') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h5>{{ $jumlahKategoriBerita }}</h5>

                <p>Jumlah Kategori Berita</p>
              </div>
              <div class="icon">
                <i class="ion ion-navicon"></i>
              </div>
              <a href="{{ url('/menu-category') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h5>{{ $jumlahPendaftarLK }}</h5>

                <p>Jumlah Mhs Mendaftar LK</p>
              </div>
              <div class="icon">
                <i class="ion ion-share"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-inf"></i></a>
            </div>
          </div>

          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h5>
                  Komisariat Mengadakan LK
                </h5>

                <p>
                  @foreach($komisariatLK as $kom)
                    {{ $kom->name }},
                  @endforeach
                </p>
              </div>
              <div class="icon">
                <i class="ion ion-checkmark"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-inf"></i></a>
            </div>
          </div>

        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@stop

@section('styles')
<style>
  #chartdiv {
    height: 500px;
  }
</style>
@stop