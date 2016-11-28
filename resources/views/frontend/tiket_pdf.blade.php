<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $getTiket->no_tiket }}</title>
	<style>
		div h1,h2,h3,h4,h5,h6 {margin-bottom: -20px;}
	</style>
</head>
<body>
	<div style="text-align: center;">
		<h3>PEMDA KABUPATEN SEMARANG</h3>
		<H2>SKRD</H2>
		<h4>PERDA NO. 8 TAHUN 2016</h4>
		<H2>TANDA MASUK</H2>
		<h4>UNTUK : {{ $getTiket->jumlah }} PENGUNJUNG SATU KALI MASUK</h4>
		<h5>KAWASAN OBYEK WISATA ELING BENING</h5>
		<h3>Rp. {{ number_format($getTiket->total_cost,'2',',','.') }}</h3>
	</div>
	<div>
		<h3><small>SERI :</small>NO. {{ $getTiket->no_tiket }}</h3>
		<h3><small> Berlaku Tanggal :</small>
			<?php 
                $month = [
                      '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                    ];
                $tanggal = $getTiket->tanggal;
                $tgl     = date("d", strtotime($tanggal));
                $bulan   = date("m", strtotime($tanggal));
                $tahun   = date("Y", strtotime($tanggal));
                for($i=1; $i<=12; $i++){
                  }
                $doff     = $tgl.' '.$month[$bulan].' '.$tahun;
            ?>
          {{ ucwords($doff) }}
		</h3>
	</div>
</body>
</html>