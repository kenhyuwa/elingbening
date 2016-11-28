@if(count($pesans))
  @foreach($pesans as $pesan)
  <div class="col-md-6" data-id="{{ $pesan->id }}">
    <div id="pesan" class="info-box-content" style="padding-bottom: 30px">
    <div class="info-box bottom-padd">
      <div class="nama left">
        <span><i class="fa fa-user aqua"></i>&nbsp;Pengirim :</span><span>{{ ucwords($pesan->nama) }}</span>
      </div>
      <div class="nama left">
        <span><i class="fa fa-envelope aqua"></i>&nbsp;E-mail :</span><span><i class="blue">{{ $pesan->email }}</i></span>
      </div>
      <div class="nama left">
          <span>
            <?php        
              $bulan = array(
                  '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                );
              $tgl = date("d", strtotime($pesan->created_at));
              $bulank = date("m", strtotime($pesan->created_at));
              $tahun = date("Y", strtotime($pesan->created_at));
              $jam = date("H:i:s", strtotime($pesan->created_at));
                  for($i=1; $i<=12; $i++){
                    }
            ?>
          <i class="fa fa-calendar-check-o aqua"></i>&nbsp;{{ $tgl }} {{ $bulan[$bulank] }} {{  $tahun }}&nbsp;
          <i class="fa fa-history aqua"></i>&nbsp;{{ $jam }}<br/>
          </span>
      </div>
      <div class="nama left" style="margin-bottom: 30px">
        <span>Pesan :</span><br/><span>&quot;&nbsp;{{ ucfirst(substr($pesan->pesan,'0','500')) }}&nbsp;&quot;</span>
      </div>
      @if($pesan->status == 0)
      <button type="button" onclick="approve('{{ $pesan->id }}')" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button>
      <button type="button" onclick="deletes('{{ $pesan->id }}')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
      @else
      <button type="button" onclick="block('{{ $pesan->id }}')" class="btn btn-sm btn-warning"><i class="fa fa-eye-slash"></i></button>
      <button type="button" onclick="deletes('{{ $pesan->id }}')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
      @endif
    </div>
  </div>
  </div>
  @endforeach
@else
  <div class="col-md-6">
    <div id="pesan" class="info-box-content">
    <div class="info-box bottom-padd">
      <center><h3>Tidak Ada pesan.</h3></center>
    </div>
  </div>
  </div>
@endif
