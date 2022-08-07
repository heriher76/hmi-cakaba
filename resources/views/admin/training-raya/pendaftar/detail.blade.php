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
            	<h1 class="m-0 text-dark">Detail Peserta Training Raya</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">
                  <tr>
                      <th>Nama</th>
                      <td>:</td>
                      <td>{{ $user->name }}</td>
                  </tr>
                  <tr>
                      <th>Email</th>
                      <td>:</td>
                      <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                      <th>Kategori Peserta</th>
                      <td>:</td>
                      <td>
                        @if($user->training_raya_kategori_id == 1)
                          LK2
                        @elseif($user->training_raya_kategori_id == 2)
                          LKK
                        @elseif($user->training_raya_kategori_id == 3)
                          SC
                        @endif
                      </td>
                  </tr>
                  <tr>
                      <th>Asal Cabang</th>
                      <td>:</td>
                      <td>{{ $user->asal_cabang }}</td>
                  </tr>
                  <tr>
                      <th>Sertifikat LK1</th>
                      <td>:</td>
                      <td>
                        @if(!empty($user->sertifikat_lk1))
                        <a href="{{ url($user->sertifikat_lk1) }}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
                        @else
                        Belum ada
                        @endif
                      </td>
                  </tr>
                  @if($user->training_raya_kategori_id == 1 || $user->training_raya_kategori_id == 2)
                  <tr>
                      <th>Judul Jurnal</th>
                      <td>:</td>
                      <td>{{ $user->judul_jurnal }}</td>
                  </tr>
                  <tr>
                      <th>File Jurnal</th>
                      <td>:</td>
                      <td>
                        @if(!empty($user->file_jurnal))
                        <a href="{{ url($user->file_jurnal) }}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
                        @else
                        Belum ada
                        @endif
                      </td>
                  </tr>
                  @elseif($user->training_raya_kategori_id == 3)
                  <tr>
                      <th>Judul Essay</th>
                      <td>:</td>
                      <td>{{ $user->judul_essay }}</td>
                  </tr>
                  <tr>
                      <th>File Essay</th>
                      <td>:</td>
                      <td>
                        @if(!empty($user->file_essay))
                        <a href="{{ url($user->file_essay) }}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
                        @else
                        Belum ada
                        @endif
                      </td>
                  </tr>
                  <tr>
                      <th>Judul Sindikat</th>
                      <td>:</td>
                      <td>{{ $user->judul_sindikat }}</td>
                  </tr>
                  <tr>
                      <th>File Sindikat</th>
                      <td>:</td>
                      <td>
                        @if(!empty($user->file_sindikat))
                        <a href="{{ url($user->file_sindikat) }}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
                        @else
                        Belum ada
                        @endif
                      </td>
                  </tr>
                  @endif
                  <tr>
                      <th>Screenshot Hasil Plagiarism</th>
                      <td>:</td>
                      <td>
                        @if(!empty($user->ss_hasil_plagiarism))
                          <a href="{{ url($user->ss_hasil_plagiarism) }}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
                        @else
                          Belum Cek
                        @endif
                      </td>
                  </tr>
                  <tr>
                      <th>Surat Rekomendasi</th>
                      <td>:</td>
                      <td>
                        @if(!empty($user->file_sindikat))
                        <a href="{{ url($user->surat_rekomendasi_training_raya) }}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
                        @else
                        Belum ada
                        @endif
                      </td>
                  </tr>
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