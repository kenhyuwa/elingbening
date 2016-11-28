@extends('layouts.apps')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-shopping-cart"></i> Transaksi</a></li>
    <li class="active">Pemesanan tiket</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
      <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Pemesanan tiket</h3>
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
                    <th>Kode Tiket</th>
                    <th>Pemesan</th>
                    <th>Telepon</th>
                    <th>Tanggal</th>
                    <th>Jumlah Tiket</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no =1; ?>
                  @foreach ($orders as $order)
                  <tr data-id="{{ $order->no_tiket }}">
                    <td>{{ $no++ }}</td>
                    <td>{{ $order->no_tiket }}</td>
                    <td>{{ ucwords($order->nama) }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>
                        <?php 
                            $month = [
                                  '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                                ];
                            $tanggal = $order->tanggal;
                            $tgl     = date("d", strtotime($tanggal));
                            $bulan   = date("m", strtotime($tanggal));
                            $tahun   = date("Y", strtotime($tanggal));
                            for($i=1; $i<=12; $i++){
                              }
                            $doff     = $tgl.' '.$month[$bulan].' '.$tahun;
                        ?>
                      {{ ucwords($doff) }}
                    </td>
                    <td>{{ $order->jumlah }}</td>
                    <td>Rp. {{ number_format($order->total_cost,'2',',','.') }}</td>
                    <td>
                      <center>
                        @if($order->status == 0)
                        <label class="label label-warning"><i class="fa fa-circle"></i> Belum dibayar</label>
                        @else
                        <span class="label label-success"><i class="fa fa-check-circle"></i> Success</span>
                        @endif
                      </center>
                    </td>
                    <td>
                      <center>
                        <a type="button" onclick="update('{{ $order->no_tiket }}')" class="btn btn-xs btn-flat btn-success"><i class="fa fa-check-circle"></i></a>
                        <a type="button" onclick="deletes('{{ $order->no_tiket }}')" class="btn btn-xs btn-flat btn-danger"><i class="fa fa-trash-o"></i></a>
                      </center>
                    </td>
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

  function update(id)
  {
      var id = id;
      var PATH = APP_URL+'/order/'+id;

      swal({   
        title: "Apakah Anda yakin?",   
        text: "Pengunjung telah melunasinya !",   
        type: "warning",
        html: true,   
        showCancelButton: true,   
        // confirmButtonColor: "#DD6B55",   
        confirmButtonColor: "#3edc81",
        confirmButtonText: "Yes",    
        cancelButtonText: "Cancel",   
        closeOnConfirm: true,   
        closeOnCancel: true 
        }, 
        function(isConfirm){   
          if (isConfirm) { 
              $.ajax({
                type:"post",
                url :PATH,
                data : { id:id },
                    beforeSend:function(xhr){
                      var token = $('meta[name="csrf-token"]').attr('content');

                      if(token){
                        return xhr.setRequestHeader('X-CSRF-TOKEN',token);
                      }
                    },
                success : function(data){
                  if(data.success == 'true'){
                    $("tr[data-id='"+id+"']").fadeOut("fast", function(){
                      $(this).remove();
                    });
                  }
                  if(data.success == 'false'){
                    swal("Gagal!", " ", "error");
                  }
                }
              });   
          swal("Lunas!", " ", "success");   
        } else {     
          swal("Dibatalkan!", " ", "error");   
        } 
      });
  }

    function deletes(id)
  {
      var id = id;
      var PATH = APP_URL+'/delete/'+id;

      swal({   
        title: "Apakah Anda yakin?",   
        text: "Tetap menghapus data ini !",   
        type: "warning",
        html: true,   
        showCancelButton: true,   
        // confirmButtonColor: "#DD6B55",   
        confirmButtonColor: "#3edc81",
        confirmButtonText: "Delete",    
        cancelButtonText: "Cancel",   
        closeOnConfirm: true,   
        closeOnCancel: true 
        }, 
        function(isConfirm){   
          if (isConfirm) { 
              $.ajax({
                type:"post",
                url :PATH,
                data : { id:id },
                    beforeSend:function(xhr){
                      var token = $('meta[name="csrf-token"]').attr('content');

                      if(token){
                        return xhr.setRequestHeader('X-CSRF-TOKEN',token);
                      }
                    },
                success : function(data){
                  if(data.success == 'true'){
                    $("tr[data-id='"+id+"']").fadeOut("fast", function(){
                      $(this).remove();
                    });
                  }
                  if(data.success == 'false'){
                    swal("Gagal!", " ", "error");
                  }
                }
              });   
          swal("Berhasil!", "Data berhasil dihapus !", "success");   
        } else {     
          swal("Dibatalkan!", " ", "error");   
        } 
      });
  }
</script>
@stop
