@extends('layouts.apps')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-file-pdf-o"></i> Report</a></li>
    <li class="active">Report Penjualan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-7">
      <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Data Penjualan Tahun {{ date('Y') }}</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
            <div id="list" class="box-body">
              <table id="product-table" class="table table-hover table-striped table-bordered">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th>Bulan</th>
                    <th>Terjual</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no =1; ?>
                  @foreach ($data as $value)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                    <?php 
                      $month = [
                            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                          ];
                          
                      ?>
                      {{ ucwords($month[$value->bulan]) }}
                    </td>
                    <td>{{ $value->jumlah }} Tiket</td>
                    <td>Rp. {{ number_format($value->total,'2',',','.') }}</td>
                  </tr>
                  @endforeach
                    <tr>
                      <td colspan="3" style="text-align: right;"><b>Total</b></td>
                      <td>
                        <b>Rp. {{ number_format($total_cost,'2',',','.') }}</b>
                      </td>
                    </tr>
                </tbody>
              </table>
            </div><!-- /.box-body -->
          <div class="box-footer">
          </div><!-- /.box-footer-->
        </div><!-- /.box -->
    </div><!-- /.col -->

    <div class="col-md-5">
      <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Cetak Data</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <form action="{{ URL('report/jual') }}" method="POST">
              {{ csrf_field() }}
            <div id="list" class="box-body">
                <div class="form-group">
                  <label for="1" class="col-sm-3 control-label">Dari Tanggal :</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="text" id="1" name="tanggal_1" class="form-control">
                    </div>
                  </div>
                </div>
                <div style="height: 50px;"></div>
                <div class="form-group">
                  <label for="2" class="col-sm-3 control-label">Sampai Tanggal :</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="text" id="2" name="tanggal_2" class="form-control">
                    </div>
                  </div>
                </div>
                <div style="height: 50px;"></div>
            </div><!-- /.box-body -->
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-12">
                  <button type="submit" id="btn-save" class="btn btn-danger pull-right" data-toggle="tooltip" title="print"><i class="fa fa-print"></i></button>
              </div>
            </div>
          </div><!-- /.box-footer-->
        </form>
        </div><!-- /.box -->
    </div><!-- /.col -->
</div>

</section><!-- /.content -->
@endsection

@section('script')
  <script>
    $('.form-control').datepicker({
      format:"dd-mm-yyyy",
      // format:"yyyy-mm-dd",
      autoclose:true
    });

    $('.form-control').val("{{ date('d-m-Y', strtotime(\Carbon\Carbon::now('Asia/Jakarta'))) }}");

    @if(Session::has('error'))
      swal({
        title: "Ma\'af !!!",
        text: "{{ Session::get('error') }}",
        showConfirmButton:true,
        type:'error'
      });
    @endif
  </script>
@stop
