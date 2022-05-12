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
                <h3 class="card-title">Edit Tentang HMI Cakaba</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('admin/about') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle1">Visi</label>
                    <textarea name="visi" class="form-control textarea">{{$about->visi ?? ''}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Misi</label>
                    <textarea name="misi" class="form-control textarea">{{$about->misi ?? ''}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Profil</label>
                    <textarea name="profile" class="form-control textarea">{{$about->profile ?? ''}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Proker</label>
                    <textarea name="proker" class="form-control textarea">{{$about->proker ?? ''}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Image</label>
                    <br>
                    @if(!empty($about->image))
                    	<img src="{{ url($about->image) }}" class="img-responsive" style="width: 100px;">
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

@section('styles')
<!-- summernote -->
<link rel="stylesheet" href="{{ url('adminlte/plugins/summernote/summernote-bs4.css') }}">
@stop

@section('scripts')
<!-- Summernote -->
<script src="{{ url('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@stop