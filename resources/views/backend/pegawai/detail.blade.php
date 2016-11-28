@extends('layouts.apps')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> User</a></li>
    <li class="active">Detail User</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<!-- form start -->
<form method="POST" action="{{ URL('pegawai/update/'.base64_encode($detail->kode_pegawai)) }}" enctype="multipart/form-data" class="form-horizontal">
{{ csrf_field() }}
  <div class="row">
    <div class="col-md-8">
      <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">User</h3>
            <div class="box-tools pull-right">
              <button type="button" onclick="updates()" id="update" class="btn btn-box-tool" data-toggle="tooltip" title="Update"><i class="fa fa-cog"></i></button>
              <button type="button" onclick="details()" id="detail" class="btn btn-box-tool" data-toggle="tooltip" title="Detail"><i class="fa fa-search-plus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
            <div class="box-body">
            <div class="box-update">
              <div class="form-group">
                <label for="kode_pegawai" class="col-sm-3 control-label">Kode Pegawai :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="kode_pegawai" name="kode_pegawai" placeholder="Kode Pegawai" value="{{ $detail->kode_pegawai }}" autocomplete="off" readonly="true">
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Employee Name" value="{{ $detail->name }}" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label for="gender" class="col-sm-3 control-label">Gender :</label>
                <div class="col-sm-9">
                @if($detail->gender == 'male')
                  <div class="radio">
                    <label for="l">
                      <input type="radio" name="gender" id="l" class="flat-red" value="male" checked>
                      Laki-laki
                    </label>
                  </div>
                  <div class="radio">
                    <label for="p">
                      <input type="radio" name="gender" id="p" class="flat-red" value="female">
                      Perempuan
                    </label>
                  </div>
                  @else
                  <div class="radio">
                    <label for="l">
                      <input type="radio" name="gender" id="l" class="flat-red" value="male">
                      Laki-laki
                    </label>
                  </div>
                  <div class="radio">
                    <label for="p">
                      <input type="radio" name="gender" id="p" class="flat-red" value="female" checked>
                      Perempuan
                    </label>
                  </div>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">Phone :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="phone" name="phone" data-inputmask='"mask": "(9999) 99-999-999"' data-mask placeholder="Phone" value="{{ $detail->phone }}" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Level :</label>
                <div class="col-sm-9">
                <?php
                  $status = [
                      "administrator" =>"Administrator","casier" =>"Casier"
                  ];
                ?>
                {!! Form::select('level', $status, $detail->level, ['id' => 'status', 'class' => 'form-control']) !!}
                </div>
              </div>
            </div>
            {{-- detail --}}
            <div class="box-detail">
              <div class="form-group">
                <label for="nik" class="col-sm-3 control-label">Kode Pegawai :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                    <input type="text" class="form-control" value="{{ $detail->kode_pegawai }}" disabled="true">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="employee_name" class="col-sm-3 control-label">Name :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" value="{{ ucwords($detail->name) }}" disabled="true">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="gender" class="col-sm-3 control-label">Gender :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                  @if($detail->gender == 'male')
                    <span class="input-group-addon"><i class="fa fa-mars"></i></span>
                    <input type="text" class="form-control" value="Laki-laki" disabled="true">
                    @else
                    <span class="input-group-addon"><i class="fa fa-venus"></i></span>
                    <input type="text" class="form-control" value="Perempuan" disabled="true">
                  @endif
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">Phone :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-tty"></i></span>
                    <input type="text" class="form-control" value="{{ $detail->phone }}" disabled="true">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Level :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <input type="text" class="form-control" value="{{ ucwords($detail->level) }}" disabled="true">
                  </div>
                </div>
              </div>
            </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    {{-- images --}}
    <div class="col-md-4">
      <!-- Horizontal Form -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">User Images</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
          <div class="box-body" style="padding-bottom: 22px;">
          <div class="box-update">
            <div class="form-group">
              <label for="user_img" class="col-sm-12 control-label">User Images :</label>
              <div class="col-sm-12">
                <input type="file" class="form-control" id="user_img" name="user_img">
              </div>
            </div>
            <div class="form-group">
              <label for="showgambar" class="col-sm-12 control-label">Images Preview :</label>
              <div class="col-sm-12">
                <img src="{{ asset('upload/images/thumbnails/'.$detail->picture) }}" alt="..." id="showgambar" class="margin" style="max-width: 150px;max-height: 100px;width: 100%;height: 100%;">
              </div>
            </div>
            </div>
            {{-- detail --}}
          <div class="box-detail">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url({{ asset('upload/images/thumbnails/'.$detail->picture) }}) center center; height: 235px;background-size: cover;">
                </div>
                <div class="widget-user-image" style="top: 190px;">
                  <img class="img-circle" src="{{ asset('upload/images/thumbnails/'.$detail->picture) }}" alt="User Avatar">
                </div>
                  <div class="row" style="margin-top: 50px;">
                    <div class="col-sm-12 border-right">
                      <div class="description-block" style="margin-top: 20px;">
                        <h3 class="widget-user-username">{{ ucwords($detail->name) }}</h3>
                        <h5 class="widget-user-desc">({{ ucwords($detail->level) }})</h5>
                        <h5 class="description-header">{{ $detail->phone }}</h5>
                        <span class="description">{{ $detail->getUser->email }}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
              </div><!-- /.widget-user -->
          </div>
          </div>
          <div class="box-update">
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right">Save</button>
              <a href="{{ URL('employee') }}" class="btn btn-default pull-right" style="margin-right: 10px;">Cancel</a>
            </div><!-- /.box-footer -->
          </div>
      </div><!-- /.box -->
    </div>
  </div>
</form>

</section><!-- /.content -->
@endsection

@section('script')
<script>

   //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
  });

  details();

  $("[data-mask]").inputmask();
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

  $("#user_img").change(function () {
      readURL(this);
  });

  function updates() {
    $('#update').hide();
    $('#detail').show();
    $('.box-update').show();
    $('.box-update').show();
    $('.box-detail').hide();
  }

  function details() {
    $('#detail').hide();
    $('#update').show();
    $('.box-update').hide();
    $('.box-update').hide();
    $('.box-detail').show();
  }
</script>
@stop
