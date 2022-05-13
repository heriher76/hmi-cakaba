@extends('layouts.app')

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
                <h3 class="card-title">Tambah User Customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('user-apps') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName1">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Masukkan Nama" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email Pengguna" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" 
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{8,}$" title="Minimum delapan karakter, setidaknya satu huruf besar, satu huruf kecil, satu angka dan satu simbol" 
                    class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Konfirmasi Password</label>
                    <input type="password" name="c_password" 
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{8,}$"
                    class="form-control" id="exampleInputPassword2" placeholder="Ulangi Password" title="Minimum delapan karakter, setidaknya satu huruf besar, satu huruf kecil, satu angka dan satu simbol" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                        <input type="file" name="image_profile" id="exampleInputFile" required>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" name="confirm-email" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Klik untuk konfirmasi email otomatis.</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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