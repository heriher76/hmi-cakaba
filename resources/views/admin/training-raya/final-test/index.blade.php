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
            	<h1 class="m-0 text-dark">Final Test {{ $title }}</h1>
                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#createQuestionModal">
                    Tambah Pertanyaan
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <h3>List Pertanyaan</h3>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tgl dibuat</th>
                    <th>Pertanyaan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($list_pertanyaan as $key => $pertanyaan)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($pertanyaan->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y H:i') }}</td>
                    <td>{{ $pertanyaan->pertanyaan }}</td>
                    <td>
                    	<a href="{{ url('/admin/training-raya/final-test/delete/'.$pertanyaan->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Pertanyaan ini?')">Hapus</a>
                    </td>
                  </tr>
                  @endforeach
                  </tfoot>
                </table>
                <hr>
                <h3>List Jawaban Peserta</h3>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($list_jawaban as $key => $respon)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ \DB::table('users')->find($respon->user_id)->name ?? '-' }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-xs detail" data-id="{{ $respon->user_id }}">
                            Lihat Jawaban
                        </button>
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
        <div class="modal fade" id="jawabanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        </div>
        
        <div class="modal fade" id="createQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleScreenerLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/training-raya/final-test') }}" method="POST" id="tambahPertanyaanModal">
                        @csrf
                        <input type="hidden" name="training_raya_kategori_id" value="{{ $kategori_id }}">
                        <input type="hidden" name="tipe" value="{{ $tipe }}">
                        <div class="form-group">
                            <label for="reg-ln">Pertanyaan</label>
                            <input type="text" name="pertanyaan" class="form-control">
                            @if($errors->has('pertanyaan'))
                            <div class="invalid-feedback" style="display: block" role="alert">Data tidak valid.</div>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="tambahPertanyaanModal" class="btn btn-primary">Kirim</button>
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
  
  $('.detail').click(function() {
        let id = $(this).data('id');
        
        $.ajax({
            url: "{{ url('/admin/training-raya/final-test/detail') }}",
            type: "POST",
            data: {
                user_id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                console.log(response);
                $('#jawabanModal').html(response);
                $('#jawabanModal').modal('show');
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
    })
</script>
@stop