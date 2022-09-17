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
            	<h1 class="m-0 text-dark">List Bukti Screening {{$user->name}} {{ $title }}</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Materi</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($list_materi as $key => $materi)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $materi->nama }}</td>
                    <td>
                    	@if(!empty($materi->bukti))
                    		<p style="color:green;">Selesai</p> (Screener: {{ \DB::table('training_raya_screener')->where('id', $materi->bukti->training_raya_screener_id)->first()->nama ?? '' }} )
                    	@else
                    		Belum Selesai
                    	@endif
                    </td>
                    <td>
                    	@if(!empty($materi->bukti))
                        <button type="button" class="btn btn-primary btn-xs openModalScreener" data-toggle="modal" data-target="#screenerModal{{$materi->id}}">
                            Lihat Bukti
                        </button>
                    	<a href="{{ url('/admin/training-raya/hasil-screening/delete/'.$materi->bukti->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Bukti ini?')">Hapus</a>
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
        @foreach($list_materi as $key => $materi)
        @if(!empty($materi->bukti))
        <div class="modal fade" id="screenerModal{{$materi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleScreenerLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ \Carbon\Carbon::parse($materi->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y H:i') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                	<center>
                		<img src="{{ url($materi->bukti->bukti_foto) }}" class="img-responsive" style="width: 30vw; height: auto;">
                	</center>
                </div>
                <div class="modal-footer">
                
                </div>
                </div>
            </div>
        </div>
        @endif
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