@extends('layouts.asset')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block my-3">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="row justify-content-center">
    <div class="col-lg-12">
        <section class="content">

            <!-- Default box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Assets List</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 20%">
                                    Asset Name
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    AMS Code
                                </th>
                                <th>
                                    Serial
                                </th>
                                <th class="text-center">
                                    Status
                                </th>
                                <th class="text-center">
                                    Category
                                </th>
                                @role('admin')
                                <th>
                                    Purchase Price
                                </th>
                                @endrole
                                <th style="width: 20%">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('assets.partials.asset')
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>
</div>


@endsection
