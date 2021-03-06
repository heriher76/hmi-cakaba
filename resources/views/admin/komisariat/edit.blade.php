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
                <h3 class="card-title">Edit Entitas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('admin/komisariat/'.$komisariat->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle1">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleInputTitle1" placeholder="Masukkan Nama" value="{{$komisariat->name}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTitle1">Slug</label>
                    <input type="text" name="slug" class="form-control" id="exampleInputTitle1" placeholder="Masukkan Slug" value="{{$komisariat->slug}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTitle1">Image</label>
                    <br>
                    @if(!empty($komisariat->image))
                      <img src="{{ url($komisariat->image) }}" class="img-responsive" style="width: 100px;">
                      <br>
                      <label>*Upload untuk mengubah</label>
                    @endif
                    <input type="file" name="image" class="form-control">
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