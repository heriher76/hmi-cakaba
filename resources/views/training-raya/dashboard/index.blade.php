@extends('layouts.front')

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Dashboard Training Raya</h2>
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li>Dashboard</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <section id="contact" class="contact">
    <div class="container">

      <div class="row justify-content-center" data-aos="fade-up">

        <div class="col-lg-10">

			<div class="alert alert-success" role="alert">
			Selamat anda dinyatakan <b>LULUS</b> menjadi peserta Training Raya di HMI Cabang Kabupaten Bandung. Silahkan masuk grup Whatsapp berikut. <a href="#" class="alert-link">Klik Disini</a>
			</div>
			
			<div class="alert alert-warning" role="alert">
			Mohon maaf anda dinyatakan <b>TIDAK LULUS</b> tetapi jangan putus semangat, tetap junjung kaderisasi. Yakinkan pada diri bahwa proses tidak akan mengkhianati hasil. Yakin Usaha Sampai!
			</div>

          	<div class="info-wrap">
			  	<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Informasi</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Upload Persyaratan</a>
						<a class="nav-item nav-link" id="nav-screening-tab" data-toggle="tab" href="#nav-screening" role="tab" aria-controls="nav-screening" aria-selected="false">Kartu Screening</a>
						<a class="nav-item nav-link" id="nav-resume-tab" data-toggle="tab" href="#nav-resume" role="tab" aria-controls="nav-resume" aria-selected="false">Resume Materi</a>
						<a class="nav-item nav-link" id="nav-makalah-tab" data-toggle="tab" href="#nav-makalah" role="tab" aria-controls="nav-makalah" aria-selected="false">Jurnal Peserta</a>
						<a class="nav-item nav-link" id="nav-absensi-tab" data-toggle="tab" href="#nav-absensi" role="tab" aria-controls="nav-absensi" aria-selected="false">Absensi</a>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<br>	
						@foreach($list_informasi as $info)
							<b>{{ \Carbon\Carbon::parse($info->tanggal)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y') }}</b>
							<ul>
								<li>{{ $info->deskripsi }} @if(!empty($info->url))<a href="{{ url($info->url) }}" target="_blank">Klik Disini</a>@endif</li>
							</ul>
						@endforeach
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<br>
						<form action="{{ url('/upload-persyaratan') }}" method="POST" enctype="multipart/form-data">
							@csrf
							{{ method_field('put') }}
							<div class="row">
								<div class="col-sm-12">	
									<div class="form-group">
										<label for="reg-ln">Judul Jurnal</label>
										<input type="text" name="judul_jurnal" class="form-control">
										@if($errors->has('judul_jurnal'))
											<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
										@endif
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="reg-ln">Upload File Jurnal</label>
										@if(!empty($me->file_jurnal))
											<input class="form-control" name="file_jurnal" type="file" id="reg-ln">
											<p style="color: red;">*Upload kembali untuk mengubah</p>
										@else
											<input class="form-control" name="file_jurnal" type="file" id="reg-ln">
										@endif
										@if($errors->has('file_jurnal'))
											<div class="invalid-feedback" style="display: block" role="alert">Jurnal tidak valid.</div>
										@endif
									</div>
								</div>
								<div class="col-sm-6">
									@if(!empty($me->file_jurnal))
										<br> 
											<a href="{{ url($me->file_jurnal) }}" class="btn btn-primary btn-xs" target="_blank">Lihat Jurnal Saya</a>
										<br>
									@endif
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="reg-ln">Upload Rekomendasi Cabang</label>
										@if(!empty($me->surat_rekomendasi_training_raya))
											<input class="form-control" name="surat_rekomendasi_training_raya" type="file" id="reg-ln">
											<p style="color: red;">*Upload kembali untuk mengubah</p>
										@else
											<input class="form-control" name="surat_rekomendasi_training_raya" type="file" id="reg-ln">
										@endif
										@if($errors->has('surat_rekomendasi_training_raya'))
											<div class="invalid-feedback" style="display: block" role="alert">Jurnal tidak valid.</div>
										@endif
									</div>
								</div>
								<div class="col-sm-6">
									@if(!empty($me->surat_rekomendasi_training_raya))
										<br> 
											<a href="{{ url($me->surat_rekomendasi_training_raya) }}" class="btn btn-primary btn-xs" target="_blank">Lihat Surat Rekom</a>
										<br>
									@endif
								</div>
							</div>
							<hr>
							<center>
								<button type="submit" class="btn btn-success">Kirim</button>
							</center>
						</form>
					</div>
					<div class="tab-pane fade" id="nav-screening" role="tabpanel" aria-labelledby="nav-screening-tab">
						<br>
						<table class="table table-striped">
							<tr>
								<th>No</th>
								<th>Materi</th>
								<th>Opsi</th>
							</tr>
							@foreach($list_materi_screening as $key => $materi)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $materi->nama }}</td>
								<td>
									<button type="button" class="btn btn-primary openModalScreening" data-toggle="modal" data-target="#screeningModal" data-id="{{ $materi->id }}">
										Tandai Selesai
									</button>
								</td>
							</tr>
							@endforeach
						</table>
					</div>
					<div class="tab-pane fade" id="nav-resume" role="tabpanel" aria-labelledby="nav-resume-tab">
						<br>
						<form action="{{ url('/kirim-resume') }}" id="formScreeningModal">
							<input type="hidden" name="training_raya_kategori_id" value="{{ $me->training_raya_kategori_id }}">
							<div class="form-group">
								<label for="reg-ln">Pilih Materi</label>
								<select name="training_raya_materi_screening" id="" class="form-control">
									@foreach($all_materi_screening as $materi)
									<option value="{{$materi->id}}">{{ $materi->nama }}</option>
									@endforeach
								</select>
								@if($errors->has('training_raya_materi_screening'))
								<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
								@endif
							</div>
							<br>
							<div class="form-group">
								<label for="reg-ln">Judul Resume</label>
								<input type="text" name="judul_resume" class="form-control">
								@if($errors->has('judul_resume'))
									<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
								@endif
							</div>
							<br>
							<div class="form-group">
								<label for="reg-ln">Isi Resume</label>
								<textarea name="deskripsi" cols="30" rows="10"></textarea>
								@if($errors->has('deskripsi'))
									<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
								@endif
							</div>
							<br>
							<center>
								<button type="submit" class="btn btn-primary">Kirim</button>
							</center>
						</form>
					</div>
					<div class="tab-pane fade" id="nav-makalah" role="tabpanel" aria-labelledby="nav-makalah-tab">
						<br>
						<div class="row">
							@foreach($list_jurnal as $jurnal)
							<div class="col-md-3 col-sm-4 col-xs-6">
								<div class="card" style="width: 18rem;">
									<div class="card-body">
										<h5 class="card-title">{{ $jurnal->name }}</h5>
										<h6 class="card-subtitle mb-2 text-muted">{{ $jurnal->judul_jurnal }}</h6>
										<a href="{{ url('/dashboard-training/jurnal/'.$me->id) }}" class="card-link">Lihat</a>
										<a href="{{ url($me->file_jurnal) }}" class="card-link" target="_blank">Unduh</a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="nav-absensi" role="tabpanel" aria-labelledby="nav-absensi-tab">
						<br>
						<table class="table table-striped">
							<tr>
								<th>No</th>
								<th>Materi</th>
								<th>Waktu Absen</th>
							</tr>
							@foreach($list_absen_saya as $key => $absen)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ \DB::table('training_raya_materi_forum')->where('id', $absen->training_raya_materi_forum_id)->first()->nama ?? '-' }}</td>
								<td>{{ \Carbon\Carbon::parse($absen->tanggal)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y H:i') ?? '-' }}</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
        
		</div>

      </div>

    </div>
	<div class="modal fade" id="screeningModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tandai Selesai</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ url('/selesai-screening') }}" id="formScreeningModal">
					@csrf
					<input type="hidden" name="materi_id" id="idMateri">
					<input type="hidden" name="training_raya_kategori_id" value="{{ $me->training_raya_kategori_id }}">
					<div class="form-group">
						<label for="reg-ln">Pilih Screener</label>
						<select name="training_raya_screener" id="" class="form-control">
							@foreach($list_screener as $screener)
							<option value="{{$screener->id}}">{{ $screener->nama }}</option>
							@endforeach
						</select>
						@if($errors->has('training_raya_screener'))
						<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
						@endif
					</div>
					<div class="form-group">
						<label for="reg-ln">Bukti Foto</label>
						<input type="file" name="bukti_foto" class="form-control">
						@if($errors->has('bukti_foto'))
						<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
						@endif
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" form="formScreeningModal" class="btn btn-primary">Kirim</button>
			</div>
			</div>
		</div>
	</div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
@stop

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
	$(document).on("click", ".openModalScreening", function () {
		var materiId = $(this).data('id');
		$("#idMateri").val(materiId);
	});
</script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
	tinymce.init({
		selector: 'textarea'
	});
</script>
@stop

@section('style')
<style>
	.tox-notification { display: none !important }
</style>
@stop