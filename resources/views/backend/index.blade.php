@extends('layouts.apps')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li class="active"><a href="#"><i class="fa fa-google-wallet"></i> Dashboard</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
@if( Session::has( 'success' ) )
<div id="callout" class="callout callout-info" style="cursor: pointer;">
    <?php

      date_default_timezone_set('Asia/Jakarta');

      $waktu = getdate();

      if($waktu['hours'] <= 9)
      {
        echo '<span class="hidden-xs">SELAMAT</span> PAGI';
      }
      else if($waktu['hours'] <= 14)
      {
        echo '<span class="hidden-xs">SELAMAT</span> SIANG';
      }
      else if($waktu['hours'] <= 18)
      {
        echo '<span class="hidden-xs">SELAMAT</span> SORE';
      }
      else
      {
        echo '<span class="hidden-xs">SELAMAT</span> MALAM';
      }

      $users = (auth()->user()->getPegawai->name);
      $jumlah = 1;
      $hasil = implode(' ', array_slice(explode(' ', $users), 0, $jumlah));

     ?> 
     {{ strtoupper($hasil) }}'s
  </div>
  @endif
<div class="row">
  <div class="col-md-8">
    <!-- LINE CHART -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Grafik Penjualan Tiket Tahun {{ date('Y') }}</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div style="text-align: center;margin: 0 auto;margin-left: 120px;width: 30px;float: left;">
          <div style="width: 20px;height: 20px;background-color: #3c8dbc;margin: 5px"></div>
          <div style="width: 20px;height: 20px;background-color: #00a65a;margin: 5px"></div>
        </div>
        <div style="text-align: left;margin: 0 auto;margin-left: 150px;width: 30px;">
          <div style="width: 200px;height: 20px;color: #3c8dbc;margin: 5px">Tiket Terjual<span style="margin-left: 10px;color: #000">{{ $tiket }} </span></div>
          <div style="width: 200px;height: 20px;color: #00a65a;margin: 5px">Pendapatan<span style="margin-left: 10px;color: #000">Rp. {{ number_format($pendapatan,'2',',','.') }}</span></div>
        </div>
        <div class="chart">
          <canvas id="lineChart" style="height:485px"></canvas>
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col (RIGHT) -->
  <div class="col-md-4">
      <!-- Default box -->
        <div class="box box-info">
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
                    <div class="widget-user-header bg-black" style="background: url({{ asset('assets/images/2.jpg') }}) center center; height: 235px;background-size: cover;">
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

@section('script')
<script>
    $('#callout').click(function(){
        $(this).fadeOut('fast');
    });
</script>
 <script>
      $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#lineChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
          @php(
          $bulan = [
            "1"  => "January", 
            "2"  => "February", 
            "3"  => "March", 
            "4"  => "April", 
            "5"  => "May", 
            "6"  => "June", 
            "7"  => "July", 
            "8"  => "Agustus", 
            "9"  => "September", 
            "10" => "Ocktober", 
            "11" => "November", 
            "12" => "December"
          ]
        )
          labels: [
            @foreach($grafiks as $grafik)
              "{{ $bulan[$grafik->bulan] }}",
            @endforeach
          ],
          datasets: [
            {
              label: "Tiket Terjual",
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "#3c8dbc",
              pointColor: "#3c8dbc",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "#dd4b39",
              data: [
                @foreach($grafiks as $grafik)
                  {{ $grafik->jumlah_bulanan }},
                @endforeach
              ]
            },
            {
              label: "Pendapatan",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "#00a65a",
              pointColor: "#00a65a",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [
                @foreach($grafiks as $grafik)
                  {{ $grafik->pendapatan }},
                @endforeach
              ]
            }
          ]
        };

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };

        //Create the line chart
        areaChart.Line(areaChartData, areaChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(areaChartData, lineChartOptions);
      });
    </script>
@stop
