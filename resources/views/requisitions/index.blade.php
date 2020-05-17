@extends('layouts.requisition')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block my-3">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="row justify-content-center">
    <div class="col-xl-12">
        <section class="content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">@role('admin') Requests List @else Your Requests @endrole </h3>

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
                                <th class="text-center" style="width: 20%">
                                    Request Code
                                </th>
                                @role('admin')
                                <th class="text-center">
                                    Requestor
                                </th>
                                @endrole
                                <th class="text-center">
                                    Date Needed
                                </th>
                                <th class="text-center" style="width: 8%">
                                    Status
                                </th>
                                <th class="text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('requisitions.partials.request')
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
    </div>
</div>
@include('requisitions.partials.modalshow')



@endsection
