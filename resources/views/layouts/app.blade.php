<!DOCTYPE html>
<html lang="en">
    <head>
        
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo1.png') }}">

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('assets/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('assets/js/jquery-ui.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/sweetalert/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/alte/font-awesome/css/font-awesome.min.css') }}">
    <!-- Font -->
    <link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
      p.pp::first-letter {
        font-size: 25px;vertical-align: middle;color: #000;
      }
    </style>
    </head>
    <body>
        <div class="homepage">
            <div class="container">
                <nav class="navbar navbar-default">
                        <div class="logo">
                          <a class="navbar-brand" href="{{URL('/')}}"><img src="{{ asset('assets/images/gbr.png') }}" style="width:120px; height: 45px; position:relative;margin:10px;top: -20px;"></a>
                        </div>
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      </button>
                    </div>
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                      <nav class="link-effect-2" id="link-effect-2"> 
                        <ul class="nav navbar-nav">
                          <li class="{{ ($active == 'home') ? 'active' : '' }}">
                            <a href="{{URL('/')}}"><span data-hover="Home">Home</span></a></li>
                          <li class="{{ ($active == 'tiket') ? 'active' : '' }}">
                            <a href="{{URL::to('tiket')}}"><span data-hover="Pesan Tiket">Pesan Tiket</span></a></li>
                          <li class="{{ ($active == 'spot') ? 'active' : '' }}">
                            <a href="{{URL('gallery')}}"><span data-hover="Gallery">Gallery</span></a></li>
                          <li class="{{ ($active == 'service') ? 'active' : '' }}">
                            <a href="{{URL('service')}}"><span data-hover="Services">Services</span></a></li>
                        </ul>
                      </nav>
                    </div>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                      </ol>
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <img src="{{ asset('assets/images/1.png') }}" alt="myCarousel">
                          <div class="carousel-caption">
                            <h3>Jl. Kartini, Tambak Koyo, Bawen-Ambarawa, Semarang, Jawa Tengah 50661</h3>
                          </div>
                        </div>

                        <div class="item">
                           <img src="{{ asset('assets/images/2.jpg') }}" alt="myCarousel">
                        </div>
                      
                        <div class="item">
                           <img src="{{ asset('assets/images/3.png') }}" alt="myCarousel">
                        </div>

                        <div class="item">
                          <img src="{{ asset('assets/images/4.png') }}" alt="myCarousel">
                        </div>
                      </div>
                      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </nav>
                @yield('content')
            </div>
        </div>
        <div class="footer">
            <div class="container">
              <div class="footer-grids">
                <!--  -->
                <div class="col-md-4 footer-grid">
                  <h3>Contact Info</h3>
                  <ul>
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Jl. Kartini, Tambak Koyo, Bawen-Ambarawa, Semarang, Jawa Tengah 50661</li>
                    <li><i class="glyphicon glyphicon-time" aria-hidden="true"></i>Senin-Minggu 09.00-19.00</li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>0857-2956-5656</li>
                  </ul>
                </div>
                <div class="col-md-3 footer-grid footer-grid1">
                  <h3>Navigation</h3>
                  <ul>
                      <li class="active"><a href="{{ URL('/') }}"><span data-hover="Home">Home</span></a></li>
                      <li><a href="{{ URL('tiket') }}"><span data-hover="Pesan Tiket">Pesan Tiket</span></a></li>
                      <li><a href="{{ URL('gallery') }}"><span data-hover="Gallery">Gallery</span></a></li>
                      <li><a href="{{ URL('service') }}"><span data-hover="Services">Services</span></a></li>
                      <li><a href="{{ URL('testimoni') }}"><span data-hover="Testimoni Pengunjung">Testimoni Pengunjung</span></a></li>
                  </ul>
                </div>
                <div class="col-md-5 footer-grid">
                  <h3>Komentar</h3>
                  <form action="{{ URL('/message') }}" method="post" id="form">
                    <fieldset class="form-group">
                      <label for="formGroupExampleInput" style="color: #fff">Nama :</label>
                      <input type="text" class="form-control" name="username" id="name" placeholder="Nama">
                      <i><span id="user-data" style="color: red"></span></i>
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="formGroupExampleInput" style="color: #fff">E-mail :</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
                      <i><span id="email-data" style="color: red"></span></i>
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="formGroupExampleInput2" style="color: #fff">Komentar :</label>
                      <textarea class="form-control" id="message" name="pesan" rows="3" placeholder="Komentar"></textarea>
                      <i><span id="message-data" style="color: red"></span></i>
                    </fieldset>
                    <button type="button" onclick="kirim()" class="btn btn-success">Send</button>
                  </form>
                </div>
                <!-- <div class="col-md-4 footer-grid">
                  <h3>Connect With Us</h3>
                  <form action="#" method="post">
                    <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                    <input type="submit" value="Send">
                  </form>
                </div> -->
                <div class="clearfix"> </div>
              </div>
            </div>
          </div>
          <div class="copy-right">
            <div class="container">
              <p>&copy; 2016 </a></p>
            </div>
          </div>
        <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/move-top.js') }}"></script>
    <script src="{{ asset('assets/js/easing.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.zbox.min.js') }}"></script>
    <script src="{{asset('assets/alte/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{ asset('assets/sweetalert/sweetalert.min.js') }}"></script>
    @yield('js')
    <script>
    var APP_URL= {!! json_encode(url('/')) !!};
      jQuery(document).ready(function($) {

        $(".scroll").click(function(event){   
          event.preventDefault();
          $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });

        $().UItoTop({ easingType: 'easeOutQuart' });
        kirim();
      });

      function kirim()
      {
        var form = $('#form').serialize();
        var url = $('#form').attr('action');
        var user = $('#name').val();
        var email = $('#email').val();
        var pesan = $('#message').val();
        if(user ==''){
          $('#user-data').fadeIn(1000, function(){
                    $(this).hide();
                  });
                  $('#user-data').text('Nama tidak boleh kosong !');
                  return false;
        }
        if(email ==''){
          $('#email-data').fadeIn(1000, function(){
                    $(this).hide();
                  });
                  $('#email-data').text('Email tidak boleh kosong !');
                  return false;
        }
        if(pesan ==''){
          $('#message-data').fadeIn(1000, function(){
                    $(this).hide();
                  });
                  $('#message-data').text('Isi pesan tidak boleh kosong !');
                  return false;
        }
        $.ajax({
          type:'post',
          url:url,
          datatype:'json',
          data:{
            username:user,email:email,pesan:pesan
          },
                beforeSend:function(xhr){
                  var token = $('meta[name="csrf-token"]').attr('content');

                  if(token){
                    return xhr.setRequestHeader('X-CSRF-TOKEN',token);
                  }
                },
          success:function(data){
            if(data.success =='true'){
              swal({
                title: 'Success !!!',
                text: 'Pesan terkirim.',
                showConfirmButton:false,
                type:'success',
                timer: 2000
              });
                 $.each('#form', function(){
                  $('#name').val('');
                  $('#email').val('');
                  $('#message').val('');
              });
            }
            if(data.success =='false'){
              swal({
                title: 'Ma\'af !!!',
                text: 'Lengkapi data Anda.',
                showConfirmButton:false,
                type:'error',
                timer: 2000
              });
            }
          }
        });
      }
    </script>
    </body>
</html>
