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
    {{-- <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css" /> --}}
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
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
            <div class="col-auto">
                <div class="login-box">
                    <div class="card">
                        <div class="card-body login-card-body">
                            <h1 class="display-3 text-danger text-center">ERROR 404 | <b>PAGE CAN NOT BE FOUND</b></h1>
                            <a href="{{ route('home') }}" class="btn btn-primary">Go back to Home</a>
                        </div>
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
