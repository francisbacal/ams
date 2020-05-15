@extends('layouts.asset')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block my-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Soft Deleted Assets</h3>

                    <!--====== <Restore All> ======-->

                    {!! Form::open(['action'=>'AssetController@restoreAll', 'method' => 'post', 'id' =>
                    'assetRestoreAllForm', 'class'=>'mt-2']) !!}

                    <div class="card-tools d-flex justify-content-end align-items-center form-group">
                        <button href="#" class="btn btn-tool btn-sm" data-toggle="tooltip" title="Restore All">
                            <i class="fas fa-download"></i>
                        </button>
                    </div>

                    {!! Form::close() !!}

                    <!--====== </Restore All> ======-->

                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr class="text-center">
                                <th colspan="3">Asset</th>
                                <th></th>
                                <th></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!--====== <LIST SECTION> ======-->

                        @include('assets.partials.softdeleted', $assets)

                        <!--====== </LIST SECTION> ======-->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
