@extends('layouts.app')

@section('title', 'Daftar LK 1 HMI Cakaba')

@section('content')
<div class="container">
    <div class="container pb-5 mb-sm-4">
        <center>
            <img src="{{ url('front/assets/img/logo_hmi.png') }}" style="width: 40px; margin-right: 20px;">
            <img src="{{ url('front/assets/img/logo_cakaba_white.png') }}" style="width: 70px;">
        </center>
        <br>
        <div class="row">
            <div class="card" style="opacity: 97%;">
                <div class="card-body">
		            <div class="col-md-12 pt-sm-3">
            			<center>
            				<h2>Daftar LK 1 HMI Kab.Bandung</h2>
            			</center>
		                <form class="needs-validation" novalidate="" method="POST" action="{{ url('join-hmi') }}" enctype="multipart/form-data">
		                    @csrf
		                    <div class="row">
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-fn">Nama Lengkap</label>
		                                <input class="form-control" name="name" type="text" required="" id="reg-fn">
		                                @if($errors->has('name'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan nama yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-email">Alamat E-mail</label>
		                                <input class="form-control" name="email" type="email" required="" id="reg-email" autocomplete="new-email">
		                                @if($errors->has('email'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan alamat email yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-password">Password</label>
		                                <input class="form-control" name="password" type="password" required="" id="reg-password" autocomplete="new-password">
		                                @if($errors->has('password'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Silahkan masukkan password!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-password-confirm">Konfirmasi Password</label>
		                                <input class="form-control" name="password_confirmation" type="password" required="" id="reg-password-confirm">
		                                @if($errors->has('password_confirmation'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Password tidak sama!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-phone">Nomor HP/WA</label>
		                                <input class="form-control" name="phone" type="text" required="" id="reg-phone">
		                                @if($errors->has('phone'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan nomor handphone yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-ttl">Tempat, Tanggal Lahir</label>
		                                <input class="form-control" name="ttl" type="text" required="" id="reg-ttl">
		                                @if($errors->has('ttl'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan TTL yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-alamat_sekarang">Alamat Sekarang</label>
		                                <input class="form-control" name="alamat_sekarang" type="text" required="" id="reg-alamat_sekarang">
		                                @if($errors->has('alamat_sekarang'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan alamat yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-alamat_asal">Alamat Asal</label>
		                                <input class="form-control" name="alamat_asal" type="text" required="" id="reg-alamat_asal">
		                                @if($errors->has('alamat_asal'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan alamat yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-jk">Jenis Kelamin</label>
		                                <select class="form-control" name="jk" required id="reg-jk">
		                                	<option value="laki-laki">Laki-laki</option>
		                                	<option value="perempuan">Perempuan</option>
		                                </select>
		                                @if($errors->has('jk'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan data yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-hobby">Hobi</label>
		                                <input class="form-control" name="hobby" type="text" required="" id="reg-hobby">
		                                @if($errors->has('hobby'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan data yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-jurusan">Jurusan</label>
		                                <input class="form-control" name="jurusan" type="text" required="" id="reg-jurusan">
		                                @if($errors->has('jurusan'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan jurusan yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-fakultas">Fakultas</label>
		                                <input class="form-control" name="fakultas" type="text" required="" id="reg-fakultas">
		                                @if($errors->has('fakultas'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan fakultas yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-angkatan">Angkatan Mahasiswa</label>
		                                <input class="form-control" name="angkatan" type="text" required="" id="reg-angkatan">
		                                @if($errors->has('angkatan'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan data yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-sumber_informasi">Dapat Informasi LK1 Darimana?</label>
		                                <input class="form-control" name="sumber_informasi" type="text" required="" id="reg-sumber_informasi">
		                                @if($errors->has('sumber_informasi'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan data yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-riwayat_penyakit">Riwayat Penyakit</label>
		                                <textarea class="form-control" name="riwayat_penyakit" required="" id="reg-riwayat_penyakit"></textarea>
		                                @if($errors->has('riwayat_penyakit'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan riwayat penyakit yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-riwayat_pendidikan">Riwayat Pendidikan</label>
		                                <textarea class="form-control" name="riwayat_pendidikan" required="" id="reg-riwayat_pendidikan"></textarea>
		                                @if($errors->has('riwayat_pendidikan'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan riwayat pendidikan yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-riwayat_organisasi">Riwayat Organisasi</label>
		                                <textarea class="form-control" name="riwayat_organisasi" required="" id="reg-riwayat_organisasi"></textarea>
		                                @if($errors->has('riwayat_organisasi'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan riwayat organisasi yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-alasan_daftar_lk">Alasan Daftar LK</label>
		                                <textarea class="form-control" name="alasan_daftar_lk" required="" id="reg-alasan_daftar_lk"></textarea>
		                                @if($errors->has('alasan_daftar_lk'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan data yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-photo">Foto Pribadi</label>
		                                <input type="file" class="form-control" name="photo" required="" id="reg-photo"></input>
		                                @if($errors->has('photo'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan foto yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-komisariat_lk">Pilih Komisariat Tujuan</label>
		                                <select class="form-control" name="komisariat_lk" required id="reg-komisariat_lk">
		                                	@foreach($list_komisariat as $kom)
		                                		<option value="{{ $kom->slug }}">{{ $kom->name }}</option>
		                                	@endforeach
		                                </select>
		                                @if($errors->has('komisariat_lk'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan data yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                    </div>
		                    <div class="text-center">
		                        <button class="btn btn-success btn-lg" type="submit">Daftar LK Sekarang</button>
		                    </div>
		                </form>
		            </div>
		        </div>
		    </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
    body{
        margin-top:20px;
		background-image: url({{ url('front/assets/img/background_hmi.jpg') }});
    	background-repeat: no-repeat;
    	background-attachment: fixed;
  		background-size: cover;
    }
    .social-btn {
        display: inline-block;
        width: 2.25rem;
        height: 2.25rem;
        -webkit-transition: border-color 0.25s ease-in-out,background-color 0.25s ease-in-out,color 0.25s ease-in-out;
        transition: border-color 0.25s ease-in-out,background-color 0.25s ease-in-out,color 0.25s ease-in-out;
        border: 1px solid #e7e7e7;
        border-radius: 50%;
        background-color: #fff;
        color: #545454;
        text-align: center;
        text-decoration: none;
        line-height: 2.125rem;
        vertical-align: middle;
    }
    .form-control {
        display: block;
        width: 100%;
        height: calc(1.5em + 1rem + 2px);
        padding: .5rem 1rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #404040;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #e1e1e1;
        border-radius: 0;
        -webkit-transition: border-color 0.2s ease-in-out,-webkit-box-shadow 0.2s ease-in-out;
        transition: border-color 0.2s ease-in-out,-webkit-box-shadow 0.2s ease-in-out;
        transition: border-color 0.2s ease-in-out,box-shadow 0.2s ease-in-out;
        transition: border-color 0.2s ease-in-out,box-shadow 0.2s ease-in-out,-webkit-box-shadow 0.2s ease-in-out;
    }
    .input-group>.form-control, .input-group>.form-control-plaintext, .input-group>.custom-select, .input-group>.custom-file {
        position: relative;
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        width: 1%;
        margin-bottom: 0;
    }
    .input-group-text {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding: .5rem 1rem;
        margin-bottom: 0;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #404040;
        text-align: center;
        white-space: nowrap;
        background-color: #fff;
        border: 1px solid #e1e1e1;
    }
</style>
@stop