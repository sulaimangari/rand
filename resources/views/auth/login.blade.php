<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agate IT Support | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE/plugins/iCheck/square/blue.css')}}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .custom-select.is-invalid,
        .form-control.is-invalid,
        .was-validated .custom-select:invalid,
        .was-validated .form-control:invalid {
            border-color: #e3342f;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Agate</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group has-feedback">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">

                            <label>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{{ route('signin.azure') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i
                        class="ion ion-social-windows"></i>
                    Login with microsoft
                </a>
            </div>
            <!-- /.social-auth-links -->
            {{--
    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">I forgot my password</a><br>
            @endif --}}

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="{{ asset('vendor/AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('vendor/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('vendor/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
    </script>
</body>

</html>
