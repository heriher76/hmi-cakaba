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
                <h3 class="card-title">Opsi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('admin/opsi-komisariat/') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle1">Buka Latihan Kader 1?</label>
                    <br>
                    <!-- Rounded switch -->
					<label class="switch">
					  <input type="checkbox" name="buka_lk" @if($komisariat->buka_lk) checked @endif>
					  <span class="slider round"></span>
					</label>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTitle1">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleInputTitle1" placeholder="Masukkan Nama" value="{{$komisariat->name}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTitle1">Slug</label>
                    <input type="text" name="slug" class="form-control" id="exampleInputTitle1" placeholder="Masukkan Slug" value="{{$komisariat->slug}}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTitle1">Image</label>
                    <br>
                    @if(!empty($komisariat->image))
                      <img src="{{ url($komisariat->image) }}" class="img-responsive" style="width: 100px;">
                      <br>
                      <label>*Upload untuk mengubah</label>
                    @endif
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
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
<style type="text/css">
	/* The switch - the box around the slider */
	.switch {
	  position: relative;
	  display: inline-block;
	  width: 60px;
	  height: 34px;
	}

	/* Hide default HTML checkbox */
	.switch input {
	  opacity: 0;
	  width: 0;
	  height: 0;
	}

	/* The slider */
	.slider {
	  position: absolute;
	  cursor: pointer;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #ccc;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	.slider:before {
	  position: absolute;
	  content: "";
	  height: 26px;
	  width: 26px;
	  left: 4px;
	  bottom: 4px;
	  background-color: white;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	input:checked + .slider {
	  background-color: #2196F3;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(26px);
	  -ms-transform: translateX(26px);
	  transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	  border-radius: 34px;
	}

	.slider.round:before {
	  border-radius: 50%;
	}
</style>
@endsection