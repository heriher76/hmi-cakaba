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
            	<h1 class="m-0 text-dark">Respon Harian {{ $title }}</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($list_respon as $key => $respon)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($respon->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y H:i') }}</td>
                    <td>{{ $respon->nama_user }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-xs openModalScreener" data-toggle="modal" data-target="#screenerModal{{$respon->id}}">
                            Lihat Respon
                        </button>
                    	<a href="{{ url('/admin/training-raya/respon-harian/delete/'.$respon->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Respon ini?')">Hapus</a>
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
        @foreach($list_respon as $key => $respon)
        <div class="modal fade" id="screenerModal{{$respon->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleScreenerLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $respon->nama_user }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! $respon->jawaban !!}
                </div>
                <div class="modal-footer">
                
                </div>
                </div>
            </div>
        </div>
        @endforeach
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