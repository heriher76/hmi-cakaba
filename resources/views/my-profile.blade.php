@extends('layouts.front')

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Profil Saya</h2>
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li>Profil Saya</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <section id="contact" class="contact">
    <div class="container">

      <div class="row justify-content-center" data-aos="fade-up">

        <div class="col-lg-10">

          <div class="info-wrap">
          	@if(Session::has('passwordChanged'))
            <div class="alert alert-warning" role="alert">
              Password telah diubah, silahkan anda dapat logout dan login kembali dengan klik tombol berikut
              <a class="btn btn-primary" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  Login Ulang
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
            @endif
          	<form action="{{ url('/my-profile') }}" method="POST" enctype="multipart/form-data">
          	@csrf
          	{{ method_field('put') }}
            <div class="row">
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-fn">Nama Lengkap</label>
	                      <input class="form-control" name="name" type="text" value="{{ $me->name }}" id="reg-fn">
	                      @if($errors->has('name'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Masukkan nama yang valid!</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-email">Alamat E-mail</label>
	                      <input class="form-control" name="email" type="email" value="{{ $me->email }}" id="reg-email" autocomplete="new-email" required>
	                      @if($errors->has('email'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Masukkan alamat email yang valid!</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Tempat, Tanggal Lahir</label>
	                      <input class="form-control" name="ttl" type="text" value="{{ $me->ttl }}" id="reg-ln">
	                      @if($errors->has('ttl'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Tempat tanggal lahir tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-phone">Nomor HP/WA</label>
	                      <input class="form-control" name="phone" type="text" value="{{ $me->phone }}" id="reg-phone">
	                      @if($errors->has('phone'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Masukkan nomor handphone yang valid!</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Alamat Sekarang</label>
	                      <input class="form-control" name="alamat_sekarang" type="text" value="{{ $me->alamat_sekarang }}" id="reg-ln">
	                      @if($errors->has('alamat_sekarang'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Alamat tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Alamat Asal</label>
	                      <input class="form-control" name="alamat_asal" type="text" value="{{ $me->alamat_asal }}" id="reg-ln">
	                      @if($errors->has('alamat_asal'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Alamat asal tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Jenis Kelamin</label>
	                      <select class="form-control" name="jk" required>
	                      	<option value="laki-laki" @if($me->jk == 'laki-laki') selected @endif>Laki-laki</option>
	                      	<option value="perempuan" @if($me->jk == 'perempuan') selected @endif>Perempuan</option>
	                      </select>
	                      @if($errors->has('jk'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Jenis kelamin tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Hobi</label>
	                      <input class="form-control" name="hobby" type="text" value="{{ $me->hobby }}" id="reg-ln">
	                      @if($errors->has('hobby'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Hobi tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Jurusan</label>
	                      <input class="form-control" name="jurusan" type="text" value="{{ $me->jurusan }}" id="reg-ln">
	                      @if($errors->has('jurusan'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Jurusan tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Fakultas</label>
	                      <input class="form-control" name="fakultas" type="text" value="{{ $me->fakultas }}" id="reg-ln">
	                      @if($errors->has('fakultas'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Fakultas tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Angkatan Mahasiswa</label>
	                      <input class="form-control" name="angkatan" type="text" value="{{ $me->angkatan }}" id="reg-ln">
	                      @if($errors->has('angkatan'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Angkatan valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Angkatan LK</label>
	                      <input class="form-control" name="angkatan_lk" type="text" value="{{ $me->angkatan_lk }}" id="reg-ln">
	                      @if($errors->has('angkatan_lk'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Angkatan LK tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Komisariat LK</label>
	                      <input class="form-control" name="komisariat_lk" type="text" value="{{ $me->komisariat_lk }}" id="reg-ln">
	                      @if($errors->has('komisariat_lk'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Komisariat LK tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Riwayat Pendidikan</label>
	                      <textarea class="form-control" name="riwayat_pendidikan" type="text" id="reg-ln">{{ $me->riwayat_pendidikan }}</textarea>
	                      @if($errors->has('riwayat_pendidikan'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Riwayat Pendidikan tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Riwayat Organisasi</label>
	                      <textarea class="form-control" name="riwayat_organisasi" type="text" id="reg-ln">{{ $me->riwayat_organisasi }}</textarea>
	                      @if($errors->has('riwayat_organisasi'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Riwayat Organisasi tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Alasan Daftar LK</label>
	                      <textarea class="form-control" name="alasan_daftar_lk" type="text" id="reg-ln">{{ $me->alasan_daftar_lk }}</textarea>
	                      @if($errors->has('alasan_daftar_lk'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Alasan daftar LK tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Pekerjaan</label>
	                      <textarea class="form-control" name="pekerjaan" type="text" id="reg-ln">{{ $me->pekerjaan }}</textarea>
	                      @if($errors->has('pekerjaan'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Pekerjaan tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-ln">Foto Profil</label>
	                      @if(!empty($me->photo))
	                      	<br> 
	                      	<img src="{{ url($me->photo) }}" style="width: 100px;" class="img-responsive">
	                      	<br>
	                      	<p style="color: red;">*Upload untuk mengubah</p>
	                      @endif
	                      <input class="form-control" name="photo" type="file" id="reg-ln">
	                      @if($errors->has('photo'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Foto tidak valid.</div>
	                      @endif
	                  </div>
	              </div>
            </div>
            <hr>
            <div class="row">
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-password">Password Baru</label>
	                      <input class="form-control" name="new_password" type="password" id="reg-password" autocomplete="new-password">
	                      @if($errors->has('new_password'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Silahkan masukkan password!</div>
	                      @endif
	                  </div>
	              </div>
	              <div class="col-sm-6">
	                  <div class="form-group">
	                      <label for="reg-password">Konfirmasi Password Baru</label>
	                      <input class="form-control" name="new_password_confirmation" type="password" id="reg-password" autocomplete="new-password">
	                      @if($errors->has('new_password_confirmation'))
	                      <div class="invalid-feedback" style="display: block" role="alert">Silahkan masukkan password!</div>
	                      @endif
	                  </div>
	              </div>
            	  <p style="color: red;">*Isi untuk mengubah password</p>
            </div>
            <center>
            	<button type="submit" class="btn btn-success">Simpan</button>
            </center>
            </form>
          </div>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
@stop