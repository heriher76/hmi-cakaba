@extends('layouts.front')

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Pengajuan Surat Rekomendasi</h2>
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li>Pengajuan Surat Rekomendasi</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= About Us Section ======= -->
  <section id="about-us" class="about-us">
    <div class="container" data-aos="fade-up">

      <div class="row content">
        <div class="col-lg-12" data-aos="fade-right">
        	<form action="{{ url('surat-rekomendasi') }}" method="post" role="form">
        	  @csrf
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="name" id="subject" placeholder="Nama" value="@php auth()->user()->name ?? '' @endphp" required disabled>
              </div>
              <div class="form-group mt-3">
              	<select name="type_training" required class="form-control">
              		<option value="LK2">LK2</option>
              		<option value="LK3">LK3</option>
              		<option value="LKK">LKK</option>
              		<option value="SC">SC</option>
              		<option value="Lainnya">Lainnya</option>
              	</select>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="title_training" id="subject" placeholder="Nama Training" required>
              </div>
              <div class="form-group mt-3">
                <input type="date" class="form-control" name="date_training" id="subject" placeholder="Tanggal Training" required>
              </div>
              <br>
              <div class="text-center">
              	<button type="submit" class="btn btn-success">Ajukan</button>
              </div>
            </form>
        </div>
      </div>
      <hr>
      <div class="row content">
      	<div class="col-lg-12" data-aos="fade-left">
      		<h3>Riwayat Pengajuan</h3>
      		<table class="table table-striped">
      			<tr>
      				<th>No</th>
      				<th>Tipe Training</th>
      				<th>Nama Training</th>
      				<th>Tanggal Training</th>
      				<th>Tanggal Pengajuan</th>
      				<th>Status</th>
      				<th>Opsi</th>
      			</tr>
      			@foreach($myQueue as $key => $data)
      			<tr>
      				<td>{{ $key+1 }}</td>
      				<td>{{ $data->type_training }}</td>
      				<td>{{ $data->title_training }}</td>
      				<td>{{ $data->date_training }}</td>
      				<td>{{ $data->created_at }}</td>
      				<td>
      					@if($data->approve_bpl)
      						-Sudah ACC BPL
      					@endif
      					@if($data->approve_pa)
      						-Sudah ACC Cabang
      					@endif
      				</td>
      				<td>
      					@if($data->approve_pa && $data->approve_bpl)
      						<form action="{{ url('surat-rekomendasi/export') }}" method="POST">
      							@csrf
      							<input type="hidden" name="id_surat" value="{{ $data->id }}">
      							<button type="submit" class="btn btn-primary">Cetak</button>
      						</form>
      					@else
      						Masih Proses Pengajuan
      					@endif
      				</td>
      			</tr>
      			@endforeach
      		</table>
      	</div>
      </div>

    </div>
  </section><!-- End About Us Section -->

</main><!-- End #main -->
@stop