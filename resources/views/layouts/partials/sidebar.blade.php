<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{  asset('dist/img/AMS-logo.png') }}" alt="AMS Logo" class="brand-img img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light brand-txt mb-0">AMS</span>
        <div class="d-flex justify-content-center mt-2">
            <p class="brand-text font-weight-light">Asset Management System</p>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{  asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#"
                    class="d-block">{{ (Auth::user()) ? Auth::user()->firstname ." ". Auth::user()->lastname  : "" }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{--====== ASSETS ======--}}
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Assets
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    {{--====== ASSETS CATEGORIES ======--}}

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('assets.index') }}"
                                class="nav-link {{ (Request::url() == route('assets.index')) ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Assets</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-action="available" href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Available</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Deployed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>For Diagnosis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>For Repair</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--====== REQUESTS ======--}}
                <li class="nav-item has-treeview menu-open">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Requests<i class="right fas fa-angle-left"></i></p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('requisitions.index') }}"
                                class="nav-link {{ (Request::url() == route('requisitions.index')) ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Request List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('requisitions.create') }}" class="nav-link
                                {{ (Request::url() == route('requisitions.create')) ? "active" : "" }}"">
                                <i class=" far fa-circle nav-icon"></i>
                                <p>Create New Request</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
