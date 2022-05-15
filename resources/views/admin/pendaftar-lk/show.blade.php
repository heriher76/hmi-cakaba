@extends('layouts.admin')

@section('contents')
<div class="content-wrapper">
	<br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Pendaftar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-fn">Nama Lengkap</label>
                              <input disabled class="form-control" name="name" type="text" value="{{ $user->name }}" id="reg-fn">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-email">Alamat E-mail</label>
                              <input disabled class="form-control" name="email" type="email" value="{{ $user->email }}" id="reg-email" autocomplete="new-email" required>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Tempat, Tanggal Lahir</label>
                              <input disabled class="form-control" name="ttl" type="text" value="{{ $user->ttl }}" id="reg-ln">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-phone">Nomor HP/WA</label>
                              <input disabled class="form-control" name="phone" type="text" value="{{ $user->phone }}" id="reg-phone">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Alamat Sekarang</label>
                              <input disabled class="form-control" name="alamat_sekarang" type="text" value="{{ $user->alamat_sekarang }}" id="reg-ln">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Alamat Asal</label>
                              <input disabled class="form-control" name="alamat_asal" type="text" value="{{ $user->alamat_asal }}" id="reg-ln">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Jenis Kelamin</label>
                              <select class="form-control" name="jk" disabled>
                                <option value="laki-laki" @if($user->jk == 'laki-laki') selected @endif>Laki-laki</option>
                                <option value="perempuan" @if($user->jk == 'perempuan') selected @endif>Perempuan</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Hobi</label>
                              <input disabled class="form-control" name="hobby" type="text" value="{{ $user->hobby }}" id="reg-ln">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Jurusan</label>
                              <input disabled class="form-control" name="jurusan" type="text" value="{{ $user->jurusan }}" id="reg-ln">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Fakultas</label>
                              <input disabled class="form-control" name="fakultas" type="text" value="{{ $user->fakultas }}" id="reg-ln">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Angkatan Mahasiswa</label>
                              <input disabled class="form-control" name="angkatan" type="text" value="{{ $user->angkatan }}" id="reg-ln">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Angkatan LK</label>
                              <input disabled class="form-control" name="angkatan_lk" type="text" value="{{ $user->angkatan_lk }}" id="reg-ln">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Komisariat LK</label>
                              <input disabled class="form-control" name="komisariat_lk" type="text" value="{{ $user->komisariat_lk }}" id="reg-ln">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Riwayat Pendidikan</label>
                              <textarea disabled class="form-control" name="riwayat_pendidikan" type="text" id="reg-ln">{{ $user->riwayat_pendidikan }}</textarea>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Riwayat Organisasi</label>
                              <textarea disabled class="form-control" name="riwayat_organisasi" type="text" id="reg-ln">{{ $user->riwayat_organisasi }}</textarea>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Alasan Daftar LK</label>
                              <textarea disabled class="form-control" name="alasan_daftar_lk" type="text" id="reg-ln">{{ $user->alasan_daftar_lk }}</textarea>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Pekerjaan</label>
                              <textarea disabled class="form-control" name="pekerjaan" type="text" id="reg-ln">{{ $user->pekerjaan }}</textarea>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Foto Profil</label>
                              @if(!empty($user->photo))
                                <br> 
                                <img src="{{ url($user->photo) }}" style="width: 100px;" class="img-responsive">
                              @endif
                          </div>
                      </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@stop