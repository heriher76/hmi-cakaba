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
            	<h1 class="m-0 text-dark">Hasil Screening {{ $title }}</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah Selesai</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($list_users as $key => $user)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->jumlah_selesai }}</td>
                    <td>
                        @php
                            if($kategori_id == 1)
                                $url = 'hasil-screening-lk2';
                            elseif($kategori_id == 2)
                                $url = 'hasil-screening-lkk';
                            elseif($kategori_id == 3)
                                $url = 'hasil-screening-sc';
                        @endphp
                        <a href="{{ url('/admin/training-raya/'.$url.'/'.$user->id) }}" class="btn btn-primary">Lihat Bukti</a>
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