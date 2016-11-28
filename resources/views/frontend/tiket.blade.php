@extends('layouts.app')
@section('content')
<div class="team">
    <div class="">
    <div id="box">
      <h3 style="font-family: cursive;">Ticket Reservation </h3><hr>
      
    {{Form::open(array('url'=>'tiket','method'=>'post','class'=>'form-horizontal col-md-8', 'id'=>'form'))}}

  <div class="form-group">
    <label class="col-md-4  control-label">No Tiket :</label>
    <div class="enjoycss col-md-8">
      <input type="text" name="no_tiket" class="form-control" id="no tiket" placeholder="No Tiket" value="{{ $newKode }}" disabled/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label">Nama Lengkap :</label>
    <div class="col-md-8">
      <input type="text" name="nama" class="form-control focus" id="nama" placeholder="Nama Lengkap" autofocus="autofocus">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label">Alamat :</label>
    <div class="col-md-8">
      <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label">Jumlah Tiket :</label>
    <div class="col-md-8">
      <select class="form-control" name="jumlah" id="jmltiket" onchange="pilih()"  />
      <option value="">--Jumlah tiket--</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      </select>
    </div>
  </div>
   <div class="form-group">
    <label class="col-md-4 control-label">Tanggal :</label>
    <div class="col-md-8">
      <input type="text" name="tanggal" class="form-control" id="tanggal" placeholder="Tanggal Pemesanan" >
    
  </div>
</div>

  <div class="form-group">
    <label class="col-md-4 control-label">No.Telp :</label>
    <div class="col-md-8">
      <input type="text" name="phone" class="form-control" data-inputmask='"mask": "(9999) 99-999-999"' data-mask id="telpon" placeholder="No Telepon" >
    </div>
  </div>
   <div class="form-group">
    <label class="col-md-4 control-label">Harga :</label>
    <div class="col-md-8">
      <input type="text" name="price" class="form-control" id="harga" placeholder="Harga tiket" readonly />
    </div>
  </div>
     <div class="form-group">
    <label class="col-md-4 control-label">Total Harga :</label>
    <div class="col-md-8">
      <input type="text" name="total_cost" class="form-control" id="total" placeholder="Total" readonly />
    </div>
  </div>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-10">
    @if (session('no_tiket'))
    <div class="alert alert-info" role="alert">
     <a href="{{ url('tiket') }}/{{ base64_encode(Session::get('no_tiket')) }}" target="_blank">Download</a>
      </div>
    @endif
      <button type="button" id="send" onclick="sendTiket()" class="btn btn-info pull-right" value="">Send</button>

<!-- lg -->
    </div>


 
  
{{Form::close()}}

</div>

        <div class="clearfix"> </div>
       </div>
      </div>
    </div>
@endsection
@section('js')
	<script>
		function pilih()
		{
			var jumlah = document.getElementById("jmltiket").value;
			var harga =document.getElementById("harga").value = 15000;
			var total = jumlah*harga;
			document.getElementById("total").value=total;
		}
    
		$('#tanggal').datepicker({
        format: "dd-mm-yyyy",
        autoclose:true
    });

    $("[data-mask]").inputmask();

    function uRL(url)
    {
      window.location = url;
    }

    function sendTiket()
    {
      $('#send').html('<i class="fa fa-refresh fa-spin"></i> Sending...');
      $('#send').attr('disabled',true);

      var url = $('#form').attr('action');
      var formData = $('#form').serialize();
      var nm = $('#nama').val();
      var almt = $('#alamat').val();
      var jml = $('#jmltiket').val();
      var tgl = $('#tanggal').val();
      var tlp = $('#telpon').val();

      if(nm == '') {
          swal({
            title: 'Ma\'af !!!',
            text: 'Silakan Masukan Nama Anda.',
            showConfirmButton:false,
            type:'error',
            timer: 1000
          });
          $('#send').html('Send');
          $('#send').attr('disabled',false);
          return false;
        }
      if(almt == '') {
          swal({
            title: 'Ma\'af !!!',
            text: 'Silakan Masukan Alamat Anda.',
            showConfirmButton:false,
            type:'error',
            timer: 1000
          });
          $('#send').html('Send');
          $('#send').attr('disabled',false);
          return false;
        }
      if(jml == '') {
          swal({
            title: 'Ma\'af !!!',
            text: 'Silakan Masukan Jumlah Tiket Anda.',
            showConfirmButton:false,
            type:'error',
            timer: 1000
          });
          $('#send').html('Send');
          $('#send').attr('disabled',false);
          return false;
        }
      if(tgl == '') {
          swal({
            title: 'Ma\'af !!!',
            text: 'Silakan pilih Tanggal pemesanan.',
            showConfirmButton:false,
            type:'error',
            timer: 1000
          });
          $('#send').html('Send');
          $('#send').attr('disabled',false);
          return false;
        }
      if(tlp == '') {
          swal({
            title: 'Ma\'af !!!',
            text: 'Silakan Masukan nomor yang dapat dihubungi.',
            showConfirmButton:false,
            type:'error',
            timer: 1000
          });
          $('#send').html('Send');
          $('#send').attr('disabled',false);
          return false;
        }

        $.ajax({
            type:"POST",
            datatype:"JSON",
            url:url,
            cache:false,
            data:formData,
            success:function(data){
              if(data.success == 'true'){
                var id = data.id;
                $('#form')[0].reset();
                $('#send').html('Send');
                $('#send').attr('disabled',false);
                $('.focus').focus();
                swal({
                  title: "Download tiket?",   
                  text: "",   
                  type: "success",
                  html: true,   
                  showCancelButton: true,   
                  confirmButtonColor: "#3edc81",
                  confirmButtonText: "Download",    
                  cancelButtonText: "Cancel",   
                  closeOnConfirm: true,   
                  closeOnCancel: true 
                }, 
                  function(isConfirm){   
                    if (isConfirm) { 
                        $.ajax({
                          type:"GET",
                          cache:false,
                          url:APP_URL+'/tiket/'+id,
                          success: function(response){
                            uRL(APP_URL+'/tiket/'+id);
                          }
                        });     
                      } 
                    });
                  }
                if(data.success =='false') {
                  $('#send').html('Send');
                  $('#send').attr('disabled',false);
                  swal({
                    title: 'Ma\'af !!!',
                    text: 'Tanggal tidak Valid.',
                    showConfirmButton:true,
                    type:'error'
                  });
                }
            }
        });
    }
	</script>
@stop