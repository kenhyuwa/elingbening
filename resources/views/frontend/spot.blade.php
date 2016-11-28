@extends('layouts.app')
@section('content')
  <div class="portfolio" id="portfolio">
    <div class="">
      <h3>Spot Foto yang ada di Eling Bening</h3><hr>
      <div class="portfolio_grid_w3lss">
        <div class="col-md-4 portfolio_grid_w3ls">
          <div class="view second-effect">
            <a class="zb" rel=" " href="{{ asset('assets/images/12.jpg') }}">
              <img src="{{ asset('assets/images/12.jpg') }}" alt="" class="img-responsive" />
              <div class="mask">
                <p></p>
              </div>
            </a>  
          </div>  
        </div>
        <div class="col-md-4 portfolio_grid_w3ls">
          <div class="view second-effect">
            <a class="zb" rel=" " href="{{ asset('assets/images/13.jpg') }}">
              <img src="{{ asset('assets/images/13.jpg') }}" alt="" class="img-responsive" />
              <div class="mask">
                
              </div>
            </a>  
          </div>  
        </div>
        <div class="col-md-4 portfolio_grid_w3ls">
          <div class="view second-effect">
            <a class="zb" rel=" " href="{{ asset('assets/images/eling-bening.jpg') }}">
              <img src="{{ asset('assets/images/eling-bening.jpg') }}" alt="" class="img-responsive" />
              <div class="mask">
                
              </div>
            </a>  
          </div>  
        </div>
        <div class="col-md-4 portfolio_grid_w3ls">
          <div class="view second-effect">
            <a class="zb" rel=" " href="{{ asset('assets/images/9.jpg') }}">
              <img src="{{ asset('assets/images/9.jpg') }}" alt="" class="img-responsive" />
              <div class="mask">
                <p></p>
              </div>
            </a>  
          </div>  
        </div>
        <div class="col-md-4 portfolio_grid_w3ls">
          <div class="view second-effect">
            <a class="zb" rel=" " href="{{ asset('assets/images/10.jpg') }}" title="Wayfaring">
              <img src="{{ asset('assets/images/10.jpg') }}" alt="" class="img-responsive" />
              <div class="mask">
                <p></p>
              </div>
            </a>  
          </div>  
        </div>
        <div class="col-md-4 portfolio_grid_w3ls">
          <div class="view second-effect">
            <a class="zb" rel=" " href="{{ asset('assets/images/6.jpg') }}" title="Wayfaring">
              <img src="{{ asset('assets/images/6.jpg') }}" alt="" class="img-responsive" />
              <div class="mask">
                <p></p>
              </div>
            </a>  
          </div>  
        </div>
        <div class="col-md-4 portfolio_grid_w3ls">
          <div class="view second-effect">
            <a class="zb" rel=" " href="{{ asset('assets/images/7.jpg') }}" title="Wayfaring">
              <img src="{{ asset('assets/images/7.jpg') }}" alt="" class="img-responsive" />
              <div class="mask">
                <p></p>
              </div>
            </a>  
          </div>
        </div>
        <div class="col-md-4 portfolio_grid_w3ls">
          <div class="view second-effect">
            <a class="zb" rel=" " href="{{ asset('assets/images/8.jpg') }}" title="Wayfaring">
              <img src="{{ asset('assets/images/8.jpg') }}" alt="" class="img-responsive" />
              <div class="mask">
                <p></p>
              </div>
            </a>  
          </div>
        </div>
        <div class="col-md-4 portfolio_grid_w3ls">
          <div class="view second-effect">
            <a class="zb" rel=" " href="{{ asset('assets/images/9.jpg') }}" title="Wayfaring">
              <img src="{{ asset('assets/images/9.jpg') }}" alt="" class="img-responsive" />
              <div class="mask">
                <p></p>
              </div>
            </a>  
          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
      </div>
    </div>
@endsection
@section('js')
        
	<script>
		$(".zb").zbox( { margin:40 } );
	</script>
@stop