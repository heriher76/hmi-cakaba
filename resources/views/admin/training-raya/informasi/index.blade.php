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
            	<h1 class="m-0 text-dark">Informasi {{ $title }}</h1>
                <button type="button" class="btn btn-primary btn-xs openModalScreener" data-toggle="modal" data-target="#screenerModal">
                    Tambah Informasi
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>URL</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($list_informasi as $key => $info)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $info->deskripsi }}</td>
                    <td>{{ $info->tanggal }}</td>
                    <td>{{ $info->url }}</td>
                    <td>
                    	<a href="{{ url('/admin/training-raya/informasi/delete/'.$info->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Info ini?')">Hapus</a>
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
        <div class="modal fade" id="screenerModal" tabindex="-1" role="dialog" aria-labelledby="exampleScreenerLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/training-raya/informasi') }}" method="POST" id="formScreenerModal">
                        @csrf
                        <input type="hidden" name="training_raya_kategori_id" value="{{ $kategori_id }}">
                        <div class="form-group">
                            <label for="reg-ln">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" cols="30" rows="10"></textarea>
                            @if($errors->has('deskripsi'))
                            <div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="reg-ln">URL *jika ada</label>
                            <input type="text" class="form-control" name="url">
                            @if($errors->has('url'))
                            <div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="reg-ln">Tanggal</label>
                            <input type="datetime-local" class="form-control" name="tanggal">
                            @if($errors->has('tanggal'))
                            <div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="formScreenerModal" class="btn btn-primary">Kirim</button>
                </div>
                </div>
            </div>
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
  });
</script>
@stop