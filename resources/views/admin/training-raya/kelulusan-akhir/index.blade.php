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
            	<h1 class="m-0 text-dark">Kelulusan Akhir {{ $title }}</h1>
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
                    <th>Verifikasi Lulus Training</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($list_pendaftar as $key => $user)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td><a href="{{ url('admin/training-raya/user/'.$user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->asal_cabang }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        @if($user->training_raya_status_lulus_forum == 1)
                        <p style="color: green">Sudah Lulus Training</p>
                        @elseif($user->training_raya_status_lulus_forum == 2)
                        <p style="color: red">Tidak Lulus Training</p>
                        @else
                    	<a href="{{ url('/admin/training-raya/lulus-training/'.$user->id) }}" class="btn btn-success btn-xs" onclick="return confirm('Verifikasi Lulus Training Pendaftar Ini?')">Lulus</a>
                    	<a href="{{ url('/admin/training-raya/tidak-lulus-training/'.$user->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Verifikasi Tidak Lulus Training Pendaftar Ini?')">Tidak Lulus</a>
                        @endif
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
  });
</script>
@stop