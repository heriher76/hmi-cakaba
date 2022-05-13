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
                <h3 class="card-title">Edit Sosial Media</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('admin/social-media') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle1">Instagram</label>
                    <input type="text" name="instagram" class="form-control" value="{{ $social->instagram }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $social->email }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Kontak HP</label>
                    <input type="text" name="contact" class="form-control" value="{{ $social->contact }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Alamat</label>
                    <input type="text" name="address" class="form-control" value="{{ $social->address }}">
                  </div>
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