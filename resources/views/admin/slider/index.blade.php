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
            	<h1 class="m-0 text-dark">List Slider</h1>
            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      					Tambah Slider
      				</button>

      				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      				  <div class="modal-dialog" role="document" style="max-width: 1000px;">
      				    <div class="modal-content">
      				      <div class="modal-header">
      				        <h5 class="modal-title" id="exampleModalLabel">Form Input</h5>
      				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      				          <span aria-hidden="true">&times;</span>
      				        </button>
      				      </div>
      				      <div class="modal-body">
      				        <form action="{{ url('/admin/slider') }}" id="slider-form" method="POST" enctype="multipart/form-data">
      				        	@csrf
                        <label>Judul</label>
      				        	<input type="text" name="title" class="form-control">
                        <label>Deskripsi</label>
                        <textarea class="form-control textarea" rows="15" cols="10" name="description"></textarea>
                        <label>URL</label>
                        <input type="text" name="url" class="form-control">
                        <label>Gambar</label>
                        <input type="file" name="image" class="form-control">
      				        </form>
      				      </div>
      				      <div class="modal-footer">
      				        <button type="submit" class="btn btn-primary" form="slider-form">Simpan</button>
      				      </div>
      				    </div>
      				  </div>
      				</div>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>URL</th>
                    <th>Link Gambar</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($sliders as $key => $slider)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ strip_tags(\Illuminate\Support\Str::limit($slider->description, 60, $end='...')) }}</td>
                    <td>{{ $slider->url }}</td>
                    <td>{{ $slider->image }}</td>
                    <td>
                    	<a href="{{ url('/admin/slider/'.$slider->id.'/edit') }}" class="btn btn-success">Edit</a>
                    	<form action="{{ url('admin/slider/'.$slider->id) }}" method="POST" style="display: inline;">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Item Ini ?');">Delete</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
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
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@stop

@section('scripts')
<!-- DataTables -->
<script src="{{ url('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@stop