@extends('layouts.apps')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-shopping-cart"></i> Transaksi</a></li>
    <li class="active">Data Pengunjung</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
      <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Data Pengunjung</h3>
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
                    <th>Nama pengunjung</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  @foreach ($orders as $order)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ ucwords($order->nama) }}</td>
                    <td>{{ ucwords($order->alamat) }}</td>
                    <td>{{ $order->phone }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- /.box-body -->
          <div class="box-footer">
            {{-- Footer --}}
          </div><!-- /.box-footer-->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div>
</section><!-- /.content -->

@endsection

@section('script')
<script>
    $(function(){
      $("#product-table").DataTable();
      $('#product-table2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
</script>
@stop
