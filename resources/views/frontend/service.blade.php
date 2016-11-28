@extends('layouts.app')
@section('content')
<div class="services" id="services">
    <div class="container">
      <h3>Special Services</h3>
      <center><h4>Fasilitas yang ditawarkan di Eling Bening.</h4></center><hr>
      <div class="wthree_services_grids">
        <div class="col-md-6 wthree_services_grid">
          <div class="col-xs-4 wthree_services_grid-left">
            <!-- <div class="wthree_services_grid-left1"> -->
              <img src="{{ asset('assets/images/serve4.png') }}" class="img-responsive" alt="">
            <!-- </div> -->
          </div>
          <div class="col-xs-8 wthree_services_grid-right">
            <h4>Restoran</h4>
            <p>Menyediakan makanan khas Indonesia sangat cocok untuk kita nikmati sambil bersantai menikmati indahnya alam. Banyak menu-menu yang ditawarkan untuk dan sangat enak.</p>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="col-md-6 wthree_services_grid">
          <div class="col-xs-4 wthree_services_grid-left">
            <!-- <div class="wthree_services_grid-left1"> -->
              <img src="{{ asset('assets/images/serve7.png') }}" class="img-responsive" alt="">
            <!-- </div> -->
          </div>
          <div class="col-xs-8 wthree_services_grid-right">
            <h4>Area Bermain</h4>
            <p>Eling Bening juga menyediakan area bermain untuk anak-anak hingga dewasa untuk menemani liburanmu. </p>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="wthree_services_grids">
        <div class="col-md-6 wthree_services_grid">
          <div class="col-xs-4 wthree_services_grid-left">
            <!-- <div class="wthree_services_grid-left1"> -->
              <img src="{{ asset('assets/images/serve8.png') }}" class="img-responsive" alt="">
            <!-- </div> -->
          </div>
          <div class="col-xs-8 wthree_services_grid-right">
            <h4>Meeting Room</h4>
            <p>Eling bening juga menyediakan tempat yang sangat cocok untuk metting dengan partner kerja dan teman-taman anda suguhan pemandangan yang indah membuat suasana santai.</p>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="col-md-6 wthree_services_grid">
          <div class="col-xs-4 wthree_services_grid-left">
            <img src="{{ asset('assets/images/serve9.jpg') }}" class="img-responsive" alt="">
          </div>
          <div class="col-xs-8 wthree_services_grid-right">
            <h4>Kolam Renang</h4>
            <p>Eling bening juga menyediakan kolam renang buat yang suka berenang dengan spot pemandangan yang indah akan menemanimu. </p>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
@endsection