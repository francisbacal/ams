@extends('layouts.asset')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <section class="content">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block my-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <!-- Default box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>{{ $asset->code }}</strong></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="d-flex">
                                <h3 class="text-primary"><i class="fas fa-ethernet"></i> {{ $asset->name }} </h3>
                                @role('admin')
                                @if($asset->asset_status_id == '2')
                                <form action="{{ route('assets.withhold') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="asset_id" value="{{ $asset->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger ml-3">Withhold</button>
                                </form>
                                @endif
                                @endrole
                            </div>
                            <div class="text-muted">
                                <p class="text-md">Status:&nbsp;
                                    <b class="badge
                                    @if ($asset->asset_status_id == 1)
                                        badge-success
                                    @elseif ($asset->asset_status_id == 2)
                                        badge-info
                                    @elseif ($asset->asset_status_id == 3)
                                        badge-warning
                                    @else
                                        badge-danger
                                    @endif
                                    ">{{ $asset->status->name }}</b>
                                </p>
                            </div>
                            <div class="card-body table-responsive table-sm p-0 mt-3">
                                <table class="table table-striped projects mb-5">
                                    <tr>
                                        <td style="width: 30%; font-weight: bold;">Category</td>
                                        <td>{{ $asset->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%; font-weight: bold;">Serial</td>
                                        <td>{{ $asset->serial }}</td>
                                    </tr>
                                    @role('admin')
                                    <tr>
                                        <td style="width: 30%; font-weight: bold;">Price</td>
                                        <td>&#8369;{{ number_format($asset->price, 2) }}</td>
                                    </tr>
                                    @endrole
                                    <tr>
                                        <td style="width: 30%; font-weight: bold;">Description</td>
                                        <td>{{ $asset->description }}</td>
                                    </tr>
                                </table>

                            </div>
                            <div class="card-footer">
                                @if ($asset->user_id != null)
                                <div class="row">
                                    <div class="col-12">
                                        <p>Currently allocated to:
                                            <span><strong>{{ $asset->user->firstname }}
                                                    {{ $asset->user->lastname }}</strong></span></p>
                                    </div>
                                </div>
                                @endif
                                <a href="javascript:history.back()" class="text-primary mt-5"><i
                                        class="fas fa-arrow-left"></i> Back to Assets List</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">

                            <img src="{{ $asset->image }}" style="height; 100%;  width: 100%;" class="my-3">

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>
</div>


@endsection