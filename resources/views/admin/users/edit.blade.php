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
                  <div class="form-group">
                    <label for="exampleInputName1">Nama</label>
                    <input type="text" name="name" class="form-control" required="true" id="exampleInputName1" placeholder="Masukkan Nama" value="{{$user->name}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" required="true" id="exampleInputEmail1" placeholder="Email Pengguna" value="{{$user->email}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password Baru *isi untuk mengubah</label>
                    <input type="password" name="password" 
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{8,}$" title="Minimum delapan karakter, setidaknya satu huruf besar, satu huruf kecil, satu angka dan satu simbol"
                    class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Konfirmasi Password Baru *isi untuk mengubah</label>
                    <input type="password" name="c_password" 
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{8,}$" title="Minimum delapan karakter, setidaknya satu huruf besar, satu huruf kecil, satu angka dan satu simbol"
                    class="form-control" id="exampleInputPassword2" placeholder="Ulangi Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    @if(!empty($user->photo))
                    <br>
                    <img src="{{ url($user->photo) }}" style="height: 150px;">
                    <br>
                    <b>*Upload Gambar Lain Untuk Mengubah</b>
                    @endif
                    <div class="input-group">
                        <input type="file" name="photo" id="exampleInputFile">
                    </div>
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