@extends('layouts.apps')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> User</a></li>
    <li class="active">Add User</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<!-- form start -->
<form method="POST" action="{{ URL('pegawai/create') }}" enctype="multipart/form-data" class="form-horizontal">
{{ csrf_field() }}
  <div class="row">
    <div class="col-md-8">
      <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">User</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
            <div class="box-body">
              <div class="form-group">
                <label for="kode_pegawai" class="col-sm-3 control-label">Kode Pegawai :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="kode_pegawai" name="kode_pegawai" value="{{ $newKode }}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Nama Lengkap :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label for="gender" class="col-sm-3 control-label">Gender :</label>
                <div class="col-sm-9">
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
                </div>
              </div>
              <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">Phone :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="phone" name="phone" data-inputmask='"mask": "(9999) 99-999-999"' data-mask placeholder="Phone" value="{{ old('phone') }}" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label for="role" class="col-sm-3 control-label">Level :</label>
                <div class="col-sm-9">
                  <select id="role" name="level" class="form-control">
                  <option value="">--Select Status--</option>
                  <option value="administrator">Administrator</option>
                  <option value="casier">Casier</option>
                  </select>
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
          <div class="box-body">
            <div class="form-group">
              <label for="user_img" class="col-sm-12 control-label">User Images :</label>
              <div class="col-sm-12">
                <input type="file" class="form-control" id="user_img" name="user_img">
              </div>
            </div>
            <div class="form-group">
              <label for="showgambar" class="col-sm-12 control-label">Images Preview :</label>
              <div class="col-sm-12">
                <img src="http://placehold.it/150x100" alt="..." id="showgambar" class="margin" style="max-width: 150px;max-height: 100px;width: 100%;height: 100%;">
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Save</button>
            <a href="{{ URL('pegawai') }}" class="btn btn-default pull-right" style="margin-right: 10px;">Cancel</a>
          </div><!-- /.box-footer -->
      </div><!-- /.box -->
    </div>
  </div>
</form>

</section><!-- /.content -->
@endsection

@section('script')
<script>
  $('#dob').datepicker({
    format: 'dd-mm-yyyy'
  });

  $("[data-mask]").inputmask();

   //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
  });

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

  $(document).on('change','#brand', function(e){
      console.log(e);

      var id = e.target.value;
      var url =APP_URL+'/product/series?id_brand='+id;

      //ajax
      $.get(url, function(data){
        $('#series').empty();
        $.each(data, function(list_series, setSeries){
          $('#series').append('<option value="'+setSeries.id_series+'">'+setSeries.series_name+'</option>');
        });
      });
    });
</script>
@stop
