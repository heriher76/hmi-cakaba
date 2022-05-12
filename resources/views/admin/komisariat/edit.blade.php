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
                <h3 class="card-title">Edit Slider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('admin/slider/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle1">Judul</label>
                    <input type="text" name="title" class="form-control" id="exampleInputTitle1" placeholder="Masukkan Judul" value="{{$slider->title}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTitle1">Deskripsi</label>
                    <textarea name="description" class="form-control textarea">{{$slider->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTitle1">URL</label>
                    <input type="text" name="url" class="form-control" id="exampleInputTitle1" placeholder="Masukkan URL" value="{{$slider->url}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTitle1">Image</label>
                    <br>
                    @if(!empty($slider->image))
                      <img src="{{ url($slider->image) }}" class="img-responsive" style="width: 100px;">
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