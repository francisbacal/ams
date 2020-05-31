<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>AMS | Asset Management System - Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css" /> --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    
    <link href="{{  asset('css/all.css') }}" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />

    <style type="text/css">
        body.login-page {
            background: rgb(96, 178, 229);
            background: radial-gradient(circle, rgba(96, 178, 229, 1) 0%, rgba(6, 38, 59, 1) 94%);
        }
    </style>
</head>

<body class="login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="login-box m-0">
                    <div class="d-flex justify-content-center">
                        <img src="dist/img/AMS-logo.png" alt="AMS Logo" class="brand-img img-circle elevation-3"
                            style="opacity: .8">
                    </div>
                    <div class="login-logo d-flex align-items-center justify-content-center">
                        <p href="#" class="text-white"><b>AMS |</b></p>
                        <p class="text-white ml-1" style="font-size: 1.2rem;">Asset Management System</p>
                    </div>
                    <!-- /.login-logo -->
                    <div class="card">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">Sign in to start your session</p>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="admin@admin.com" placeholder="admin@admin.com // demo" required autocomplete="email" autofocus>
                                        {{-- value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="password123" placeholder="password123 // demo" required autocomplete="current-password">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }} />
                                            <label for="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Log in') }}
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>


                            {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                            </a>
                            @endif --}}
                        </div>
                        <!-- /.login-card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>