@extends('layouts.apps')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-file-pdf-o"></i> Report</a></li>
    <li class="active">Report Pengunjung</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-8">
      <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Data Pengunjung Tahun {{ date('Y') }}</h3>
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
                    <th>Pengunjung</th>
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
                    <td>{{ $value->jumlah_bulanan }} Orang</td>
                  </tr>
                  @endforeach
                    <tr>
                      <td colspan="2" style="text-align: right;"><b>Total</b></td>
                      <td>
                        <b>{{ $pengunjung }} Pengunjung</b>
                      </td>
                    </tr>
                </tbody>
              </table>
            </div><!-- /.box-body -->
          <div class="box-footer">
          <div class="form-group">
              <div class="col-sm-12">
                  <a href="{{ URL('report/pengunjung-pdf') }}" id="btn-save" class="btn btn-danger pull-right" data-toggle="tooltip" title="print"><i class="fa fa-print"></i></a>
              </div>
            </div>
          </div><!-- /.box-footer-->
        </div><!-- /.box -->
    </div><!-- /.col -->

    <div class="col-md-4">
      <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
            <div id="list" class="box-body">
                <div class="box-detail">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black" style="background: url({{ asset('assets/images/4.png') }}) center center; height: 235px;background-size: cover;">
                    </div>
                    <div class="widget-user-image" style="top: 190px;">
                      <img class="img-circle" src="{{ asset('assets/images/logo1.png') }}" alt="User Avatar" style="min-height: 90px; border: 1px solid #000">
                    </div>
                      <div class="row" style="margin-top: 50px;">
                        <div class="col-sm-12 border-right">
                          <div class="description-block">
                            <h3 class="widget-user-username">Eling Bening Semarang</h3>
                            <h5 class="widget-user-desc">Jl. Kartini, Tambak Koyo, Bawen-Ambarawa, Semarang, 50661</h5>
                            <h5 class="description-header">Jawa Tengah</h5>
                            <span class="description">0857-2956-5656</span>
                          </div><!-- /.description-block -->
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                  </div><!-- /.widget-user -->
              </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div>

</section><!-- /.content -->
@endsection
