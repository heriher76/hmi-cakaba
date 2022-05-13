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
                <h3 class="card-title">Edit User Customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('admin/user/'.$slug.'/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-fn">Nama Lengkap</label>
                              <input class="form-control" name="name" type="text" value="{{ $user->name }}" id="reg-fn">
                              @if($errors->has('name'))
                              <div class="invalid-feedback" style="display: block" role="alert">Masukkan nama yang valid!</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-email">Alamat E-mail</label>
                              <input class="form-control" name="email" type="email" value="{{ $user->email }}" id="reg-email" autocomplete="new-email" required>
                              @if($errors->has('email'))
                              <div class="invalid-feedback" style="display: block" role="alert">Masukkan alamat email yang valid!</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Tempat, Tanggal Lahir</label>
                              <input class="form-control" name="ttl" type="text" value="{{ $user->ttl }}" id="reg-ln">
                              @if($errors->has('ttl'))
                              <div class="invalid-feedback" style="display: block" role="alert">Tempat tanggal lahir tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-phone">Nomor HP/WA</label>
                              <input class="form-control" name="phone" type="text" value="{{ $user->phone }}" id="reg-phone">
                              @if($errors->has('phone'))
                              <div class="invalid-feedback" style="display: block" role="alert">Masukkan nomor handphone yang valid!</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Alamat Sekarang</label>
                              <input class="form-control" name="alamat_sekarang" type="text" value="{{ $user->alamat_sekarang }}" id="reg-ln">
                              @if($errors->has('alamat_sekarang'))
                              <div class="invalid-feedback" style="display: block" role="alert">Alamat tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Alamat Asal</label>
                              <input class="form-control" name="alamat_asal" type="text" value="{{ $user->alamat_asal }}" id="reg-ln">
                              @if($errors->has('alamat_asal'))
                              <div class="invalid-feedback" style="display: block" role="alert">Alamat asal tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Jenis Kelamin</label>
                              <select class="form-control" name="jk" required>
                                <option value="laki-laki" @if($user->jk == 'laki-laki') selected @endif>Laki-laki</option>
                                <option value="perempuan" @if($user->jk == 'perempuan') selected @endif>Perempuan</option>
                              </select>
                              @if($errors->has('jk'))
                              <div class="invalid-feedback" style="display: block" role="alert">Jenis kelamin tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Hobi</label>
                              <input class="form-control" name="hobby" type="text" value="{{ $user->hobby }}" id="reg-ln">
                              @if($errors->has('hobby'))
                              <div class="invalid-feedback" style="display: block" role="alert">Hobi tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Jurusan</label>
                              <input class="form-control" name="jurusan" type="text" value="{{ $user->jurusan }}" id="reg-ln">
                              @if($errors->has('jurusan'))
                              <div class="invalid-feedback" style="display: block" role="alert">Jurusan tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Fakultas</label>
                              <input class="form-control" name="fakultas" type="text" value="{{ $user->fakultas }}" id="reg-ln">
                              @if($errors->has('fakultas'))
                              <div class="invalid-feedback" style="display: block" role="alert">Fakultas tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Angkatan Mahasiswa</label>
                              <input class="form-control" name="angkatan" type="text" value="{{ $user->angkatan }}" id="reg-ln">
                              @if($errors->has('angkatan'))
                              <div class="invalid-feedback" style="display: block" role="alert">Angkatan valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Angkatan LK</label>
                              <input class="form-control" name="angkatan_lk" type="text" value="{{ $user->angkatan_lk }}" id="reg-ln">
                              @if($errors->has('angkatan_lk'))
                              <div class="invalid-feedback" style="display: block" role="alert">Angkatan LK tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Komisariat LK</label>
                              <input class="form-control" name="komisariat_lk" type="text" value="{{ $user->komisariat_lk }}" id="reg-ln">
                              @if($errors->has('komisariat_lk'))
                              <div class="invalid-feedback" style="display: block" role="alert">Komisariat LK tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Riwayat Pendidikan</label>
                              <textarea class="form-control" name="riwayat_pendidikan" type="text" id="reg-ln">{{ $user->riwayat_pendidikan }}</textarea>
                              @if($errors->has('riwayat_pendidikan'))
                              <div class="invalid-feedback" style="display: block" role="alert">Riwayat Pendidikan tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Riwayat Organisasi</label>
                              <textarea class="form-control" name="riwayat_organisasi" type="text" id="reg-ln">{{ $user->riwayat_organisasi }}</textarea>
                              @if($errors->has('riwayat_organisasi'))
                              <div class="invalid-feedback" style="display: block" role="alert">Riwayat Organisasi tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Alasan Daftar LK</label>
                              <textarea class="form-control" name="alasan_daftar_lk" type="text" id="reg-ln">{{ $user->alasan_daftar_lk }}</textarea>
                              @if($errors->has('alasan_daftar_lk'))
                              <div class="invalid-feedback" style="display: block" role="alert">Alasan daftar LK tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Pekerjaan</label>
                              <textarea class="form-control" name="pekerjaan" type="text" id="reg-ln">{{ $user->pekerjaan }}</textarea>
                              @if($errors->has('pekerjaan'))
                              <div class="invalid-feedback" style="display: block" role="alert">Pekerjaan tidak valid.</div>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="reg-ln">Foto Profil</label>
                              @if(!empty($user->photo))
                                <br> 
                                <img src="{{ url($user->photo) }}" style="width: 100px;" class="img-responsive">
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
                              <label>Informasi Training</label>
                              <div class="form-check">
                                <input type="checkbox" name="sudah_lk1" class="form-check-input" id="exampleCheck1" @if($user->sudah_lk1) checked @endif @if($user->tidak_lk) disabled @endif>
                                  
                                <label for="reg-ln">Sudah LK 1</label>
                              </div>
                              @if($errors->has('sudah_lk1'))
                              <div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
                              @endif

                              <div class="form-check">
                                <input type="checkbox" name="sudah_lk2" class="form-check-input" id="exampleCheck1" @if($user->sudah_lk2) checked @endif @if($user->tidak_lk) disabled @endif>
                                  
                                <label for="reg-ln">Sudah LK 2</label>
                              </div>
                              @if($errors->has('sudah_lk2'))
                              <div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
                              @endif

                              <div class="form-check">
                                <input type="checkbox" name="sudah_lk3" class="form-check-input" id="exampleCheck1" @if($user->sudah_lk3) checked @endif @if($user->tidak_lk) disabled @endif>
                                  
                                <label for="reg-ln">Sudah LK 3</label>
                              </div>
                              @if($errors->has('sudah_lk3'))
                              <div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
                              @endif

                              <div class="form-check">
                                <input type="checkbox" name="tidak_lk" class="form-check-input" id="exampleCheck1" @if($user->tidak_lk) checked @endif>
                                  
                                <label for="reg-ln">Tidak Pernah LK</label>
                              </div>
                              @if($errors->has('tidak_lk'))
                              <div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
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
                  @if(empty($user->email_verified_at))
                  <div class="form-check">
                    <input type="checkbox" name="confirm-email" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Klik untuk konfirmasi email otomatis.</label>
                  </div>
                  @endif

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
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