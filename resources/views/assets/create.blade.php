@extends('layouts.asset')

@section('content')
<h2 class="my-3 text-center">Add Asset</h2>
<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block my-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <!--====== <CONTENT> ======-->

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Asset Detail</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" name="name" id="inputName" class="form-control"
                                value="{{ old('name') }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Purchase Price</label>
                            <input type="text" id="inputPrice" name="price" value="{{ old('price') }}"
                                class="form-control">
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="inputSerial">Serial Number</label>
                            <input type="text" id="inputSerial" name="serial" class="form-control"
                                value="{{ $serial }}">
                            <span class="text-danger">{{ $errors->first('serial') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <textarea id="inputDescription" name="description" class="form-control"
                                rows="4">{{ old('description') }}</textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="inputCategory">Category</label>
                            <select class="form-control custom-select" name="category_id">
                                @foreach ($categories as $category)

                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        </div>
                        {{-- <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select class="form-control custom-select" name="asset_status_id">
                                @foreach ($asset_statuses as $asset_status)

                                <option value="{{ $asset_status->id }}">{{ $asset_status->name }}</option>

                        @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('asset_status_id') }}</span>
                    </div> --}}
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Image</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="image" class="mt-2">Choose Image</label>
                    <input type="file" name="image" id="imageUpload" class="form-control-file">
                </div>
                <div class="row my-2 justify-content-center">
                    <div class="col-auto">
                        <img id="asset-image-preview" class="d-none" src="" alt="product image">
                    </div>
                </div>
                <span class="text-danger">{{ $errors->first('image') }}</span>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
</div>
<div class="row justify-content-end pb-5">
    <div class="col-auto">
        <a href="#" class="text-danger mr-2">Cancel</a>
        <button type="submit" class="btn btn-primary">Add Asset</button>
    </div>
</div>
</form>
</div>

@endsection