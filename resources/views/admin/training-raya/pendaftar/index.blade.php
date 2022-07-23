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
            	<h1 class="m-0 text-dark">Pendaftar {{ $title }}</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Asal Cabang</th>
                    <th>HP</th>
                    <th>SS Plagiarism</th>
                    <th>Jurnal</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($list_pendaftar as $key => $user)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->asal_cabang }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        @if(!empty($user->ss_hasil_plagiarism))
                            <a href="{{ url($user->ss_hasil_plagiarism) }}" target="_blank" class="btn btn-warning btn-xs">Lihat</a>
                        @else
                            Belum Cek
                        @endif
                    </td>
                    <td>
                    	<a href="{{ url($user->file_jurnal) }}" class="btn btn-success btn-xs">Download Jurnal</a>
                        <button type="button" class="btn btn-primary btn-xs openModalPlagiarism" data-toggle="modal" data-target="#plagiarismModal" data-id="{{ $user->id }}">
                            Upload Plagiarism
                        </button>
                    </td>
                    <td>
                    	<a href="{{ url('/admin/training-raya/lulus/'.$user->id) }}" class="btn btn-success btn-xs" onclick="return confirm('Verifikasi Lulus Pendaftar Ini?')">Lulus</a>
                    	<a href="{{ url('/admin/training-raya/tidak-lulus/'.$user->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Verifikasi Tidak Lulus Pendaftar Ini?')">Tidak Lulus</a>
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
        <div class="modal fade" id="plagiarismModal" tabindex="-1" role="dialog" aria-labelledby="examplePlagiarismLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Screenshot Plagiarism Jurnal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/training-raya/upload-plagiarism') }}" id="formPlagiarismModal">
                        @csrf
                        <input type="hidden" name="user_id" id="idUser">
                        <input type="hidden" name="training_raya_kategori_id" value="{{ $kategori_id }}">
                        <div class="form-group">
                            <label for="reg-ln">Screenshot Plagiarism</label>
                            <input type="file" name="ss_hasil_plagiarism" class="form-control">
                            @if($errors->has('ss_hasil_plagiarism'))
                            <div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" form="formPlagiarismModal" class="btn btn-primary">Kirim</button>
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

<script>
	$(document).on("click", ".openModalPlagiarism", function () {
		var userId = $(this).data('id');
		$("#idUser").val(userId);
	});
</script>
@stop