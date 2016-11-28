
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Laporan Data Pengunjung</title>
    <style type="text/css">
      body{ padding: 5px;font-family: Times New Roman;font-size: 14px;padding-top: 20px; }
      table { border: 1px solid #000;margin: 0 auto;margin-bottom: 20px; padding: 0}
      th { height: 25px;font-size: 14px;padding: 0px 1px; }
      td{ padding: 0px 1px;height: 20px; }
      h4 { margin-bottom: 0px;font-size: 30px; }
      h2 { margin-bottom: 5px !important;margin-top: 5px; }
      h5 { margin-bottom: 0px !important;margin-top: 0px;font-style: normal; }
      h3 { margin-top: -40px; }
      i { margin-bottom: -10px; }
      .hr { border: 1px solid #000;margin-top: 0px; }
      .space { margin-top: 5px; text-align: center }
      .logo { width: 215px;height: 100px;min-width: 100%;margin-left: 0px;margin-bottom: -6px; left: 0}
      .stempel { width: 120px;height: 150px;min-width: 100%;margin-left: -25px;margin-bottom: 100px;background: transparent; }
      td.top { padding-bottom: -10px !important }
      #top { height: 100px; }
      #content { margin-top: -20px;height: 400px; }
      #content table { width: 100%;  }
      #content th { padding: 3px 3px;font-size: 16px;  }
      #content td { padding: 1px 5px 2px 5px;font-size: 14px;  }
      #content center td { padding: 1px 5px;font-size: 14px;  }
      @page { margin: 180px 50px; }
      #header { position: fixed; left: 0px; top: -160px; right: 0px; height: 150px; margin-bottom: -50px;}
      #footer { position: fixed; left: 0px; bottom: -130px; right: 0px; height: 150px; margin-top: 50px; }
      #footer .page:after { content: counter(page, upper-roman); }
    </style>
<body>
  <div id="header">
    <div id="top">
      <table border="0" style="width: 100%;">
        <tr>
          <td style="width: 215px">
            <img class="logo" src="{{ public_path('assets/images/logo1.png') }}">  {{-- jika di akses melalui localhost:8000 / php artisan serve --}}
            {{-- <img class="logo" src="{{ asset('assets/images/logo1.png') }}"> jika di akses melalui localhost/direktori/public --}}
          </td>
          <td class="top">
            <h4>Wisata Eling Bening</h4>
            <h5><i>Jl. Kartini, Tambak Koyo, Bawen-Ambarawa, Semarang, Jawa Tengah 50661</i></h5>
          </td>
        </tr>
      </table>
    </div><hr>
    <div class="hr"></div>
    <div class="space">
      <u><h2>Laporan Data Pengunjung TH {{ date("Y") }}</h2></u>
    </div>
  </div>
  <!-- /header -->
  <div id="content">
  <table border="1" cellspacing="0">
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
  </div>
  <!-- /content -->
</body>
</html>