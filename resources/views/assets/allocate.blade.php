@extends('layouts.asset')

@section('content')

<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-8 col-md-10">
        <section class="content">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block my-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @elseif ($message = Session::get('fail'))
            <div class="alert alert-danger alert-block my-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <!-- Default box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Allocate Asset</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('assets.deploy') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="allocateCategorySelect">Category:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-archive"></i>
                                    </span>
                                </div>
                                <select class="form-control custom-select" name="category_id"
                                    id="allocateCategorySelect">
                                    @foreach ($categories as $category)

                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!--====== <ASSETS> ======-->
                        <div class="form-group">
                            <label for="inputCategory">Asset:</label>
                            <div class="select2-blue">
                                <select name="assets[]" class="select2" multiple="multiple"
                                    data-dropdown-css-class="select2-blue" data-placeholder="Select Asset"
                                    style="width: 100%;" id="assetSelect">
                                    @foreach ($assets as $asset)
                                    <option value="{{ $asset->id }}">{{ $asset->name }} - {{ $asset->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="text-danger">{{ $errors->first('assets') }}</span>
                            {{-- </div> --}}
                        </div>
                        <!--====== </ASSETS> ======-->

                        <!--====== <USER> ======-->
                        <div class="form-group">
                            <label>Allocate to:</label>
                            <div class="input-group">
                                <select name="user_id" class="form-control select2bs4" style="width: 100%;"
                                    id=userSelect>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="text-danger">{{ $errors->first('user_id') }}</span>
                        </div>
                        <!--====== </USER> ======-->

                        <div class="d-flex justify-content-end p-0">
                            <button id="submitRequest" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
        </section>
    </div>

</div>

@endsection