@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container pb-5 mb-sm-4">
        <center>
            <img src="{{ url('front/assets/img/logo_hmi.png') }}" style="width: 40px; margin-right: 20px;">
            <img src="{{ url('front/assets/img/logo_cakaba_green.png') }}" style="width: 80px;">
        </center>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="h4 mb-1">Masuk</h2>
                        
                        <h3 class="h6 font-weight-semibold opacity-70 pt-4 pb-2">Pastikan email akun mu sudah terverifikasi.</h3>
                        <form class="needs-validation" novalidate="">
                            <div class="input-group form-group">
                                <div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span></div>
                                <input class="form-control" name="login_email" type="email" placeholder="Email" required="">
                                <div class="invalid-feedback">Mohon masukkan email yang valid!</div>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span></div>
                                <input class="form-control" name="login_password" type="password" placeholder="Password" required="">
                                <div class="invalid-feedback">Password salah!</div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="custom-control custom-checkbox">

                                </div><a class="nav-link-inline font-size-sm" href="{{ route('password.request') }}">Lupa password?</a>
                            </div>
                            <hr class="mt-4">
                            <div class="text-right pt-4">
                                <button class="btn btn-success" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-sm-3">
                <h2 class="h4 mb-3">Tidak punya akun? Daftar</h2>
                <form class="needs-validation" novalidate="">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-fn">Nama Lengkap</label>
                                <input class="form-control" name="regist_name" type="text" required="" id="reg-fn">
                                <div class="invalid-feedback">Masukkan nama yang valid!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-email">Alamat E-mail</label>
                                <input class="form-control" name="regist_email" type="email" required="" id="reg-email" autocomplete="new-email">
                                <div class="invalid-feedback">Masukkan alamat email yang valid!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-ln">Kode Registrasi</label>
                                <input class="form-control" name="kata_kunci" type="text" required="" id="reg-ln">
                                <div class="invalid-feedback">Kode registrasi tidak ditemukan.</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-phone">Nomor HP/WA</label>
                                <input class="form-control" name="regist_phone" type="text" required="" id="reg-phone">
                                <div class="invalid-feedback">Masukkan nomor handphone yang valid!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-password">Password</label>
                                <input class="form-control" name="regist_password" type="password" required="" id="reg-password" autocomplete="new-password">
                                <div class="invalid-feedback">Silahkan masukkan password!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-password-confirm">Konfirmasi Password</label>
                                <input class="form-control" name="regist_confirm_password" type="password" required="" id="reg-password-confirm">
                                <div class="invalid-feedback">Password tidak sama!</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Registrasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection

@section('style')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
    body{
        margin-top:20px;
        background-color:#eee;
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