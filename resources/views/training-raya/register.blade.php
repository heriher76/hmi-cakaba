@extends('layouts.app')

@section('title', 'Daftar Training Raya HMI Cakaba '. date('Y'))

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
            				<h2>Training Raya HMI Cakaba @php date('Y') @endphp</h2>
            			</center>
		                <form class="needs-validation" method="POST" action="{{ url('daftar-training-raya') }}" enctype="multipart/form-data">
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
		                                <label for="reg-asal_cabang">Asal Cabang</label>
		                                <input class="form-control" name="asal_cabang" type="text" required="" id="reg-asal_cabang">
		                                @if($errors->has('asal_cabang'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan alamat yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-sertifikat_lk1">Bukti Lulus Latihan Kader 1</label>
		                                <input type="file" class="form-control" name="sertifikat_lk1" required="true" id="reg-sertifikat_lk1"></input>
		                                @if($errors->has('sertifikat_lk1'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan file yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-photo">Foto Pribadi 3 x 4</label>
		                                <input type="file" class="form-control" name="photo" required="true" id="reg-photo"></input>
		                                @if($errors->has('photo'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Masukkan foto yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="form-group">
		                                <label for="reg-training">Pilih Training</label>
		                                <select class="form-control" name="training" required id="reg-training">
		                                	@foreach($list_training as $training)
		                                		<option value="{{ $training->id }}">{{ $training->nama }}</option>
		                                	@endforeach
		                                </select>
		                                @if($errors->has('training'))
		                                <div class="invalid-feedback" style="display: block" role="alert">Pilih data yang valid!</div>
		                                @endif
		                            </div>
		                        </div>
		                    </div>
		                    <div class="text-center">
		                        <button class="btn btn-success btn-lg" type="submit">Daftar</button>
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