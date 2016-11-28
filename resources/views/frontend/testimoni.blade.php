@extends('layouts.app')
@section('content')
<div class="services" id="services">
    <div class="container">
      <h3>Yang pernah berkunjung</h3>
      <div class="wthree_services_grids">
        @foreach($testimoni as $testi)
          <div class="col-md-6 wthree_services_grid">
            <div class="col-xs-8 wthree_services_grid-right">
              <h4><i class="fa fa-comments-o fa-3x" style="color: green"></i><i style="color: blue"> {{ ucwords($testi->nama) }}</i></h4>
              <p class="pp">"{{ ucfirst($testi->pesan) }}."</p>
            </div>
            <div class="clearfix"> </div>
          </div>
        @endforeach
      </div>
      {{ $testimoni->links() }}
    </div>
  </div>
@endsection