@extends('layouts.dashboard')


<!--====== DASHBOARD FOR ADMIN ======-->

@role('admin')
@section('content')

<!--====== NUMBER OF ASSETS ======-->
<div class="row">
    <div class="col-12">

        <!--====== <SMALL BOX> ======-->

        {{-- <h5 class="mb-2 mt-4">Asset Status</h5> --}}
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-tv"></i></span>

                    <div class="info-box-content">
                        <h3 class="info-box-number">{{ $assets->total }}</h3>
                        <span class="info-box-text">Total Assets</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <div class="row">

            <!--====== <Available> ======-->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $assets->available }}</h3>

                        <p>Available Assets</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-ethernet"></i>
                    </div>
                    <a href="#" data-id="1" class="small-box-footer assetSortLink">
                        Check <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!--====== </Available> ======-->

            <!--====== <Allocated> ======-->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $assets->allocated }}</h3>

                        <p>Allocated Assets</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <a href="#" data-id="2" class="small-box-footer assetSortLink">
                        Check <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!--====== </Allocated> ======-->

            <!--====== <For Diagnosis> ======-->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $assets->diagnosis }}</h3>

                        <p>For Diagnosis Assets</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-list-ol"></i>
                    </div>
                    <a href="#" data-id="3" class="small-box-footer assetSortLink">
                        Check <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!--====== </For Diagnosis> ======-->

            <!--====== <For Repair> ======-->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $assets->repair }}</h3>

                        <p>For Repair Assets</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <a href="#" data-id="4" class="small-box-footer assetSortLink">
                        Check <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!--====== </For Repair> ======-->

        </div>
    </div>
</div>


<!--====== MINI REQUEST ======-->

<div class="row">
    <div class="col-auto">
        <div class="card card-primary">
            <div class="card-header border-0">
                <h3 class="card-title">REQUESTS </h3><sup class="ml-2"><span
                        class="badge badge-danger display-1">LATEST</span></sup>
                <div class="card-tools">
                    <a href="{{ route('requisitions.index') }}" class="btn btn-tool btn-sm">
                        Check Requests<i class="fas fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Requestor</th>
                            <th>Date Needed</th>
                            <th class="text-center" style="width: 8%;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('partials.home.requesthome')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
@endrole


<!--====== DASHBOARD FOR NON ADMIN ======-->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card card-widget widget-user">
                <div class="widget-user-header bg-primary">
                    <h3 class="widget-user-username">{{ $user->firstname }} {{ $user->lastname }}</h3>
                    <h5 class="widget-user-desc">{{ $user->section->name }} Section</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ $user->image }}" alt="User Avatar">
                </div>

                <div class="card-body">
                    <div class="row justify-content-start">
                        <div class="col-sm-4">
                            <div class="description-block text-left">
                                <h5 class="description-header">Supervisor in charge (Section Head)</h5>
                                <span class="description-text">{{ $supervisor->firstname }}
                                    {{ $supervisor->lastname }}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                    </div>

                    <!--====== ASSETS ASSIGNE ======-->

                    <div class="row justify-content-start mt-4">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Assets Allocated to {{ $user->firstname }}
                                        {{ $user->lastname }}
                                    </h3>

                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th class="text-center" style="width: 8%;">Dates</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @include('partials.home.requesthome') --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection