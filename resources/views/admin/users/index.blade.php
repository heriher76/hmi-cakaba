@extends('layouts.app')

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
            	<h1 class="m-0 text-dark">User</h1>
            	<a href="{{ url('user-apps/create') }}" class="btn btn-primary">Tambah User</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Pengguna</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $key => $user)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @if($user->is_blocked)
                      <form action="{{ url('user-apps/unblock/'.$user->id) }}" method="POST" style="display: inline;">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda Ingin Aktifkan Pengguna Ini ?');">Aktifkan</button>
                        </form>
                      @else
                      <form action="{{ url('user-apps/block/'.$user->id) }}" method="POST" style="display: inline;">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Apakah Anda Ingin Blokir Pengguna Ini ?');">Blokir</button>
                        </form>
                      @endif
                    </td>
                    <td>
                    	<a href="{{ url('/user-apps/'.$user->id.'/edit') }}" class="btn btn-success">Edit</a>
                    	<form action="{{ url('user-apps/'.$user->id) }}" method="POST" style="display: inline;">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Pengguna Ini ?');">Delete</button>
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