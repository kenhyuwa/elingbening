<!DOCTYPE HTML>
<html>
    <head>
        <title>Login To Eling Bening</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Eling bening, semarang, wisata air" />
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link href="{{ asset('assets/css/kasir.css') }}" rel='stylesheet' type='text/css' />
        <link href="{{ asset('assets/alte/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
<body>
    <div class="login">
        <h1><a href="">Login System </a></h1>
        <div class="login-bottom">
            <center><h2>Eling Bening</h2></center>
            @if( Session::has( 'success' ) )
                <div id="callout" class="callout callout-info alert alert-info" style="cursor: pointer;padding: 20px 5px 20px 5px;padding-bottom: 1px;">
                    <center><h5>{{ Session::get('success') }}</h5></center>
                </div>
              @endif
             <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="login-mail">
                        <input type="text" name="username" value="{{ old('username') }}" required autofocus placeholder="Username" autocomplete="off">
                        <i class="fa fa-envelope"></i>
                    </div>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    <div class="login-mail">
                        <input type="password" placeholder="Password" name="password">
                        <i class="fa fa-lock"></i>
                    </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                       <a class="news-letter " href="#">
                        <label class="checkbox1">
                        <input type="checkbox" name="remember"><i> </i>Remember Me</label>
                        </a>
                </div>
                <div class="col-md-12 login-do">
                    <label class="hvr-shutter-in-horizontal login-sub">
                        <input type="submit">
                        </label>
                        {{-- <p>Do not have an account?</p>
                    <a href="{{ url('Signup') }}" class="hvr-shutter-in-horizontal">Signup</a> --}}
                </div>
                
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
        <!---->
<div class="container">
    <div class="copy-right">
        <p> &copy; 2016</p>
    </div>  
</div>
    <!--scrolling js-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"> </script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"> </script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script> 
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script> 
    addEventListener("load", function() 
    {
         setTimeout(hideURLbar, 0); 
    }, false); 

    function hideURLbar()
    { 
        window.scrollTo(0,1);
    } 
    $('#callout').click(function(){
        $(this).fadeOut('fast');
    });
    </script>
    <!--//scrolling js-->
</body>
</html>

