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
                <h3 class="card-title">Edit Template Surat</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('admin/template-surat') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle1">Sekretariat</label>
                    <input type="text" name="sekretariat" class="form-control" value="{{ $template->sekretariat }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $template->email }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Kontak HP</label>
                    <input type="text" name="contact" class="form-control" value="{{ $template->contact }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Periode</label>
                    <input type="text" name="periode" class="form-control" value="{{ $template->periode }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Kab/Kota</label>
                    <input type="text" name="kabko" class="form-control" value="{{ $template->kabko }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Ketum</label>
                    <input type="text" name="ketum" class="form-control" value="{{ $template->ketum }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Sekum</label>
                    <input type="text" name="sekum" class="form-control" value="{{ $template->sekum }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle1">Image</label>
                    <br>
                    @if(!empty($template->image))
                    	<img src="{{ url($template->image) }}" class="img-responsive" style="width: 100px;">
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