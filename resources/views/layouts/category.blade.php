<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!--====== <HEADER CONTENT> ======-->

@include('layouts.partials.head')

<!--====== </HEADER CONTENT> ======-->

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!--====== <NAVBARR> ======-->

        @include('layouts.partials.navbar')

        <!--====== </NAVBAR> ======-->


        <!--====== <MAIN SIDEBAR> ======-->

        @include('layouts.partials.sidebar')

        <!--====== </MAIN SIDEBAR> ======-->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Categories</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a>
                                </li>

                                @role('admin')
                                <li class="breadcrumb-item"><a href="{{ route('categories.trashed') }}">Recycle
                                        Bin</a>
                                </li>
                                @endrole

                                <li class="breadcrumb-item active">AMS v1.0</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->


            <section class="content">
                <div class="container-fluid">

                    <!--====== <MAIN CONTENT> ======-->

                    @yield('content')

                    <!--====== </MAIN CONTENT> ======-->

                </div>
            </section>
        </div>
        <footer class="main-footer text-center">
            <strong>Copyright &copy; 2020 <a href="{{ route('home') }}">AMS Asset Management System</a>.</strong>
            All rights reserved.
        </footer>
    </div>

    @include('layouts.partials.scripts')
</body>

</html>
