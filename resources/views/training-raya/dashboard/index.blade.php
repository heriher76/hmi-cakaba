@extends('layouts.front')

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>
			Dashboard Training Raya 
			@php
				switch($me->training_raya_kategori_id){
					case 1:
						echo '(Latihan Kader 2)';
						break;
					case 2:
						echo '(Latihan Khusus Kohati)';
						break;
					case 3:
						echo '(Senior Course)';
						break;
				}
			@endphp
		</h2>
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
			@if($me->training_raya_status_lulus_forum == 1)
			<div class="alert alert-success" role="alert">
			Selamat anda dinyatakan <b>LULUS</b> Training Raya di HMI Cabang Kabupaten Bandung. Semoga ilmu yang telah didapat bermanfaat. Yakin Usaha Sampai!
			</div>
			@elseif($me->training_raya_status_lulus_forum == 2)
			<div class="alert alert-warning" role="alert">
			Mohon maaf anda dinyatakan <b>TIDAK LULUS</b> Training Raya tetapi jangan putus semangat, tetap junjung kaderisasi. Yakinkan pada diri bahwa proses tidak akan mengkhianati hasil. Yakin Usaha Sampai!
			</div>
			@elseif($me->training_raya_status_lulus_daftar == 1)
			<div class="alert alert-success" role="alert">
			Selamat anda dinyatakan <b>LULUS</b> menjadi peserta Training Raya di HMI Cabang Kabupaten Bandung. Silahkan masuk grup Whatsapp berikut. <a href="https://s.id/grup-wa-trainingraya-cakaba" class="alert-link">Klik Disini</a>
			</div>
				@if($me->training_raya_is_paid != 1)
					<div class="alert alert-warning" role="alert">Anda belum membayar biaya registrasi sehingga fitur lain tidak dapat diakses. Silahkan selesaikan pembayaran di meja registrasi.</div>
				@endif
			@elseif($me->training_raya_status_lulus_daftar == 2)
			<div class="alert alert-danger" role="alert">
			Mohon maaf anda dinyatakan <b>TIDAK LULUS</b> tetapi jangan putus semangat, tetap junjung kaderisasi. Yakinkan pada diri bahwa proses tidak akan mengkhianati hasil. Yakin Usaha Sampai!
			</div>
			@endif

          	<div class="info-wrap">
			  	<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Informasi</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Upload Persyaratan</a>
						@if($me->training_raya_status_lulus_daftar == 1 && $me->training_raya_is_paid == 1)
						<a class="nav-item nav-link" id="nav-screening-tab" data-toggle="tab" href="#nav-screening" role="tab" aria-controls="nav-screening" aria-selected="false">Kartu Screening</a>
						<!--<a class="nav-item nav-link" id="nav-pretest-tab" data-toggle="tab" href="#nav-pretest" role="tab" aria-controls="nav-pretest" aria-selected="false">Pre-test</a>-->
						<a class="nav-item nav-link" id="nav-resume-tab" data-toggle="tab" href="#nav-resume" role="tab" aria-controls="nav-resume" aria-selected="false">Penugasan Materi</a>
						<a class="nav-item nav-link" id="nav-respon-harian-tab" data-toggle="tab" href="#nav-respon-harian" role="tab" aria-controls="nav-respon-harian" aria-selected="false">Respon Harian</a>
						<a class="nav-item nav-link" id="nav-makalah-tab" data-toggle="tab" href="#nav-makalah" role="tab" aria-controls="nav-makalah" aria-selected="false">
							@if($me->training_raya_kategori_id != 3)
							Jurnal Peserta
							@elseif($me->training_raya_kategori_id == 3)
							Essay/Sindikat Peserta
							@endif
						</a>
						<a class="nav-item nav-link" id="nav-absensi-tab" data-toggle="tab" href="#nav-absensi" role="tab" aria-controls="nav-absensi" aria-selected="false">Absensi</a>
						<a class="nav-item nav-link" id="nav-middle-test-tab" data-toggle="tab" href="#nav-middle-test" role="tab" aria-controls="nav-middle-test" aria-selected="false">Middle Test</a>
						<a class="nav-item nav-link" id="nav-final-test-tab" data-toggle="tab" href="#nav-final-test" role="tab" aria-controls="nav-final-test" aria-selected="false">Final Test</a>
						@endif
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<br>	
						@if($me->training_raya_status_lulus_daftar != 2)
							@if(count($list_informasi) == 0)
								<center><h4>Belum ada informasi</h4></center>
							@endif
							@foreach($list_informasi as $info)
								<b>{{ \Carbon\Carbon::parse($info->tanggal)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y') }}</b>
								<ul>
									<li>{{ $info->deskripsi }} @if(!empty($info->url))<a href="{{ url($info->url) }}" target="_blank">Klik Disini</a>@endif</li>
								</ul>
							@endforeach
						@else
							-
						@endif
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<br>
						<form action="{{ url('/dashboard-training/upload-persyaratan') }}" method="POST" enctype="multipart/form-data">
							@csrf
							@if($me->training_raya_kategori_id != 3)
							<div class="row">
								<div class="col-sm-12">	
									<div class="form-group">
										<label for="reg-ln">Judul Jurnal</label>
										<input type="text" name="judul_jurnal" class="form-control" required value="{{ $me->judul_jurnal }}">
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
											<input class="form-control" name="file_jurnal" type="file" id="reg-ln" required>
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
							@else
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="reg-ln">Upload Bukti Lulus LK 2</label>
										@if(!empty($me->sertifikat_lk2))
											<input class="form-control" name="sertifikat_lk2" type="file" id="reg-ln">
											<p style="color: red;">*Upload kembali untuk mengubah</p>
										@else
											<input class="form-control" name="sertifikat_lk2" type="file" id="reg-ln" required>
										@endif
										@if($errors->has('sertifikat_lk2'))
											<div class="invalid-feedback" style="display: block" role="alert">File tidak valid.</div>
										@endif
									</div>
								</div>
								<div class="col-sm-6">
									@if(!empty($me->sertifikat_lk2))
										<br> 
											<a href="{{ url($me->sertifikat_lk2) }}" class="btn btn-primary btn-xs" target="_blank">Lihat Bukti Lulus LK2</a>
										<br>
									@endif
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-12">	
									<div class="form-group">
										<label for="reg-ln">Judul Essay</label>
										<input type="text" name="judul_essay" class="form-control" required value="{{ $me->judul_essay }}">
										@if($errors->has('judul_essay'))
											<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
										@endif
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="reg-ln">Upload File Essay</label>
										@if(!empty($me->file_essay))
											<input class="form-control" name="file_essay" type="file" id="reg-ln">
											<p style="color: red;">*Upload kembali untuk mengubah</p>
										@else
											<input class="form-control" name="file_essay" type="file" id="reg-ln" required>
										@endif
										@if($errors->has('file_essay'))
											<div class="invalid-feedback" style="display: block" role="alert">Essay tidak valid.</div>
										@endif
									</div>
								</div>
								<div class="col-sm-6">
									@if(!empty($me->file_essay))
										<br> 
											<a href="{{ url($me->file_essay) }}" class="btn btn-primary btn-xs" target="_blank">Lihat Essay Saya</a>
										<br>
									@endif
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-12">	
									<div class="form-group">
										<label for="reg-ln">Judul Sindikat Wajib</label>
										<input type="text" name="judul_sindikat" class="form-control" required value="{{ $me->judul_sindikat }}">
										@if($errors->has('judul_sindikat'))
											<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
										@endif
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="reg-ln">Upload File Sindikat Wajib</label>
										@if(!empty($me->file_sindikat))
											<input class="form-control" name="file_sindikat" type="file" id="reg-ln">
											<p style="color: red;">*Upload kembali untuk mengubah</p>
										@else
											<input class="form-control" name="file_sindikat" type="file" id="reg-ln" required>
										@endif
										@if($errors->has('file_sindikat'))
											<div class="invalid-feedback" style="display: block" role="alert">Sindikat tidak valid.</div>
										@endif
									</div>
								</div>
								<div class="col-sm-6">
									@if(!empty($me->file_sindikat))
										<br> 
											<a href="{{ url($me->file_sindikat) }}" class="btn btn-primary btn-xs" target="_blank">Lihat Sindikat Wajib Saya</a>
										<br>
									@endif
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-12">	
									<div class="form-group">
										<label for="reg-ln">Judul Sindikat Pilihan</label>
										<input type="text" name="judul_sindikat_pilihan" class="form-control" required value="{{ $me->judul_sindikat_pilihan }}">
										@if($errors->has('judul_sindikat_pilihan'))
											<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
										@endif
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="reg-ln">Upload File Sindikat Pilihan</label>
										@if(!empty($me->file_sindikat_pilihan))
											<input class="form-control" name="file_sindikat_pilihan" type="file" id="reg-ln">
											<p style="color: red;">*Upload kembali untuk mengubah</p>
										@else
											<input class="form-control" name="file_sindikat_pilihan" type="file" id="reg-ln" required>
										@endif
										@if($errors->has('file_sindikat_pilihan'))
											<div class="invalid-feedback" style="display: block" role="alert">Sindikat tidak valid.</div>
										@endif
									</div>
								</div>
								<div class="col-sm-6">
									@if(!empty($me->file_sindikat_pilihan))
										<br> 
											<a href="{{ url($me->file_sindikat_pilihan) }}" class="btn btn-primary btn-xs" target="_blank">Lihat Sindikat Pilihan Saya</a>
										<br>
									@endif
								</div>
							</div>
							@endif
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
					@if($me->training_raya_status_lulus_daftar == 1)
					<div class="tab-pane fade" id="nav-screening" role="tabpanel" aria-labelledby="nav-screening-tab">
						<br>
						<table class="table table-striped">
							<tr>
								<th>No</th>
								<th>Materi</th>
								<th>Status</th>
								<th>Opsi</th>
							</tr>
							@foreach($list_materi_screening as $key => $materi)
							@php $check = \DB::table('training_raya_kartu_screening')->where('user_id', $me->id)->where('training_raya_materi_screening_id', $materi->id)->where('training_raya_kategori_id', $me->training_raya_kategori_id)->first(); @endphp
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $materi->nama }}</td>
								<td>
									@if(!empty($check))
									Selesai
									@else
									Belum Selesai
									@endif
								</td>
								<td>
									@if(!empty($check))
									
										@if(!empty($check->bukti_foto))
										<a href="{{ url($check->bukti_foto) }}" class="btn btn-primary btn-sm" target="_blank">Lihat Bukti</a>
										@endif
									<button type="button" class="btn btn-warning btn-sm openModalScreening" data-toggle="modal" data-target="#screeningModal" data-id="{{ $materi->id }}">
										Ubah Bukti
									</button>
									@else
									<button type="button" class="btn btn-primary openModalScreening" data-toggle="modal" data-target="#screeningModal" data-id="{{ $materi->id }}">
										Tandai Selesai
									</button>
									@endif
								</td>
							</tr>
							@endforeach
						</table>
					</div>
					<div class="tab-pane fade" id="nav-resume" role="tabpanel" aria-labelledby="nav-resume-tab">
						<br>
						<center><h5>Tugas yang telah dikirim</h5></center>
						<table class="table table-striped">
							<tr>
								<th>No</th>
								<th>Materi</th>
								<th>Kategori</th>
								<th>Waktu Dikirim</th>
							</tr>
							@foreach($my_resume as $key => $resume)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $resume->nama ?? '-' }}</td>
								<td>{{ $resume->kategori ?? '-' }}</td>
								<td>{{ \Carbon\Carbon::parse($resume->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y H:i') ?? '-' }}</td>
							</tr>
							@endforeach
						</table>
						<br>
						<hr>
						<br>
						<center><h5>Buat Tugas</h5></center>
						<form action="{{ url('/dashboard-training/kirim-resume') }}" id="formResumeModal" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="training_raya_kategori_id" value="{{ $me->training_raya_kategori_id }}">
							<div class="form-group">
								<label for="reg-ln">Pilih Materi</label>
								<select name="training_raya_materi_forum" id="" class="form-control">
									@foreach($all_materi_forum as $materi)
									<option value="{{$materi->id}}">{{ $materi->nama }}</option>
									@endforeach
								</select>
								@if($errors->has('training_raya_materi_forum'))
								<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
								@endif
							</div>
							<br>
							@if($me->training_raya_kategori_id == 3)
						    <div class="form-group">
    							<label for="reg-ln">Pilih Kategori Tugas</label>
    							<select name="training_raya_sc_kategori_tugas" id="training_raya_sc_kategori_tugas" class="form-control">
    								<option value="resume">Resume</option>
    								<option value="critical_review">Critical Review</option>
    								<option value="mind_map">Mind Map</option>
    							</select>
    							@if($errors->has('training_raya_sc_kategori_tugas'))
    							<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
    							@endif
    						</div>
							@endif
							<br>
							<div class="form-group">
								<label for="reg-ln">
								    Judul Tugas
								</label>
								<input type="text" name="judul_resume" class="form-control">
								@if($errors->has('judul_resume'))
									<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
								@endif
							</div>
							<br>
							@if($me->training_raya_kategori_id == 3)
							<div class="form-group tugas_file_sc" style="display:none;">
								<label for="reg-ln">File Tugas</label>
								<input type="file" name="file_tugas" class="form_control">
								@if($errors->has('deskripsi'))
									<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
								@endif
							</div>
							@endif
							<br>
							@if($me->training_raya_kategori_id == 3)
							<div class="form-group tugas_file_sc" style="display:none;">
								<label for="reg-ln">Apakah Video? <input type="checkbox" name="apakah_video" class="form_control"> <b>Ya</b>
								    <br>*Jika Gambar Maka Biarkan Jangan diceklis
								</label>
								@if($errors->has('apakah_video'))
									<div class="invalid-feedback" style=" display: block" role="alert">Data tidak valid.</div>
								@endif
							</div>
							@endif
							<br>
							<div class="form-group tugas_selain_file_sc">
								<label for="reg-ln">Isi Tugas</label>
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
					<div class="tab-pane fade" id="nav-respon-harian" role="tabpanel" aria-labelledby="nav-respon-harian-tab">
						<br>
						<center><h5>Kirim Respon Harian</h5></center>
						<form action="{{ url('/dashboard-training/kirim-respon-harian') }}" method="POST">
							@csrf
							<input type="hidden" name="training_raya_kategori_id" value="{{ $me->training_raya_kategori_id }}">
							<br>
							<div class="form-group">
								<label for="reg-ln">Deskripsi</label>
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
							@if($me->training_raya_kategori_id != 3)
								@foreach($list_jurnal as $jurnal)
								@if(!empty($jurnal->judul_jurnal) && !empty($jurnal->file_jurnal))
								<div class="col-md-3 col-sm-4 col-xs-6">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">{{ $jurnal->name }}</h5>
											<h6 class="card-subtitle mb-2 text-muted">{{ $jurnal->judul_jurnal }}</h6>
											<a href="{{ url('/dashboard-training/jurnal/'.$jurnal->id) }}" class="card-link">Lihat</a>
											<a href="{{ url($jurnal->file_jurnal) }}" class="card-link" target="_blank">Unduh</a>
										</div>
									</div>
								</div>
								@endif
								@endforeach
							@elseif($me->training_raya_kategori_id == 3)
								@foreach($list_jurnal as $jurnal)
								@if(!empty($jurnal->judul_essay) && !empty($jurnal->file_essay) && !empty($jurnal->judul_sindikat) && !empty($jurnal->file_sindikat) && !empty($jurnal->judul_sindikat_pilihan) && !empty($jurnal->file_sindikat_pilihan))
								<div class="col-md-3 col-sm-4 col-xs-6">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">{{ $jurnal->name }}</h5>
											<h6 class="card-subtitle mb-2 text-muted">{{ $jurnal->judul_essay }}</h6>
											<a href="{{ url('/dashboard-training/essay/'.$jurnal->id) }}" class="card-link">Lihat Essay</a>
											<a href="{{ url($jurnal->file_essay) }}" class="card-link" target="_blank">Unduh</a>
											<hr>
											<h6 class="card-subtitle mb-2 text-muted">{{ $jurnal->judul_sindikat }}</h6>
											<a href="{{ url('/dashboard-training/sindikat-wajib/'.$jurnal->id) }}" class="card-link">Lihat Sindikat Wajib</a>
											<a href="{{ url($jurnal->file_sindikat) }}" class="card-link" target="_blank">Unduh</a>
											<hr>
											<h6 class="card-subtitle mb-2 text-muted">{{ $jurnal->judul_sindikat_pilihan }}</h6>
											<a href="{{ url('/dashboard-training/sindikat-pilihan/'.$jurnal->id) }}" class="card-link">Lihat Sindikat Pilihan</a>
											<a href="{{ url($jurnal->file_sindikat_pilihan) }}" class="card-link" target="_blank">Unduh</a>
										</div>
									</div>
								</div>
								@endif
								@endforeach
							@endif
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
					<div class="tab-pane fade" id="nav-middle-test" role="tabpanel" aria-labelledby="nav-middle-test-tab">
						<br>
						@php $check = \DB::table('training_raya_user_question_test')->where('tipe', 'middle')->where('training_raya_kategori_id', $me->training_raya_kategori_id)->where('user_id', $me->id)->first(); @endphp
						@if(!empty($check))
						<center><h4>Anda sudah mengisi Middle Test</h4></center>
						@else
						<center><h4>Middle Test</h4></center>
						<hr>
						<form action="{{ url('/dashboard-training/middle-test') }}" method="POST">
							@csrf
							<input type="hidden" name="training_raya_kategori_id" value="{{ $me->training_raya_kategori_id }}">
							@foreach($list_pertanyaan_middle_test as $key => $pertanyaan)
							<div class="form-group">
								<h5>{{ $key+1 . '. ' . $pertanyaan->pertanyaan }}</h5>
								<textarea name="jawaban[{{ $pertanyaan->id }}]" cols="30" rows="10"></textarea>
								@if($errors->has('jawaban['.$pertanyaan->id.']'))
									<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
								@endif
							</div>
							<br>
							@endforeach
							<center>
								<button type="submit" class="btn btn-primary">Kirim</button>
							</center>
						</form>
						@endif
					</div>
					<div class="tab-pane fade" id="nav-final-test" role="tabpanel" aria-labelledby="nav-final-test-tab">
						<br>
						@php $check = \DB::table('training_raya_user_question_test')->where('tipe', 'final')->where('training_raya_kategori_id', $me->training_raya_kategori_id)->where('user_id', $me->id)->first(); @endphp
						@if(!empty($check))
						<center><h4>Anda sudah mengisi Final Test</h4></center>
						@else
						<center><h4>Final Test</h4></center>
						<hr>
						<form action="{{ url('/dashboard-training/final-test') }}" method="POST">
							@csrf
							<input type="hidden" name="training_raya_kategori_id" value="{{ $me->training_raya_kategori_id }}">
							@foreach($list_pertanyaan_final_test as $key => $pertanyaan)
							<div class="form-group">
								<h5>{{ $key+1 . '. ' . $pertanyaan->pertanyaan }}</h5>
								<textarea name="jawaban[{{ $pertanyaan->id }}]" cols="30" rows="10"></textarea>
								@if($errors->has('jawaban['.$pertanyaan->id.']'))
									<div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
								@endif
							</div>
							<br>
							@endforeach
							<center>
								<button type="submit" class="btn btn-primary">Kirim</button>
							</center>
						</form>
						@endif
					</div>
					@endif
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
				<form action="{{ url('/dashboard-training/selesai-screening') }}" id="formScreeningModal" method="POST" enctype="multipart/form-data">
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
				<button type="submit" form="formScreeningModal" class="btn btn-primary">Kirim</button>
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
	
	var $kategori_tugas = $('#training_raya_sc_kategori_tugas');
	$kategori_tugas.change(function(){
        if($(this).val() == 'mind_map') {
            $('.tugas_file_sc').show();
            $('.tugas_selain_file_sc').hide();
        }else{
            $('.tugas_file_sc').hide();
            $('.tugas_selain_file_sc').show();
        }
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