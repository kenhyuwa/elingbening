@extends('layouts.apps')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-envelope-o"></i> Message</a></li>
    <li class="active">Message</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
      <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Message</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
            <div id="list" class="box-body">
              
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
$(function() {
  listMessage();
});
function listMessage()
{
  var PATH = APP_URL+'/message/list';
  $.ajax({
    type:'GET',
    cache:false,
    url:PATH,
    success: function(data){
      $('#list').html(data);
    }
  })
}

function approve(id)
  {
      var id = id;
      var PATH = APP_URL+'/message/approve/'+id;

      swal({   
        title: "Apakah Anda yakin?",   
        text: "Menerima pesan ini !",   
        type: "warning",
        html: true,   
        showCancelButton: true,   
        // confirmButtonColor: "#DD6B55",   
        confirmButtonColor: "#3edc81",
        confirmButtonText: "Approve",    
        cancelButtonText: "Cancel",   
        closeOnConfirm: false,   
        closeOnCancel: false 
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
                    listMessage();
                  }
                  if(data.success == 'false'){
                    swal("Gagal!", " ", "error");
                  }
                }
              });   
          swal("Berhasil!", " ", "success");   
        } else {     
          swal("Dibatalkan!", " ", "error");   
        } 
      });
  }

function block(id)
  {
      var id = id;
      var PATH = APP_URL+'/message/block/'+id;

      swal({   
        title: "Apakah Anda yakin?",   
        text: "Menyembunyikan pesan ini !",   
        type: "warning",
        html: true,   
        showCancelButton: true,   
        // confirmButtonColor: "#DD6B55",   
        confirmButtonColor: "#3edc81",
        confirmButtonText: "Block",    
        cancelButtonText: "Cancel",   
        closeOnConfirm: false,   
        closeOnCancel: false 
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
                    listMessage();
                  }
                  if(data.success == 'false'){
                    swal("Gagal!", " ", "error");
                  }
                }
              });   
          swal("Berhasil!", " ", "success");   
        } else {     
          swal("Dibatalkan!", " ", "error");   
        } 
      });
  }

function deletes(id)
  {
      var id = id;
      var PATH = APP_URL+'/message/delete/'+id;

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
        closeOnConfirm: false,   
        closeOnCancel: false 
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
                    $("div[data-id='"+id+"']").fadeOut("fast", function(){
                      $(this).remove();
                    });
                  }
                  if(data.success == 'false'){
                    swal("Gagal!", " ", "error");
                  }
                }
              });   
          swal("Berhasil!", " ", "success");   
        } else {     
          swal("Dibatalkan!", " ", "error");   
        } 
      });
  }
</script>
@stop
