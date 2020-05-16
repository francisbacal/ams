@extends('layouts.asset')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit: <strong>{{ $asset->code }}</strong></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">

                            <!--====== <EDIT FORM> ======-->

                            <form action="{{ route('assets.update', ['asset' => $asset->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Asset Detail</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text" name="name" id="inputName" class="form-control"
                                                value="{{ $asset->name }}">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPrice">Purchase Price</label>
                                            <input type="text" id="inputPrice" name="price" value="{{ $asset->price }}"
                                                class="form-control">
                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSerial">Serial Number</label>
                                            <input type="text" id="inputSerial" name="serial" class="form-control"
                                                value="{{ $asset->serial}}">
                                            <span class="text-danger">{{ $errors->first('serial') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDescription">Description</label>
                                            <textarea id="inputDescription" name="description" class="form-control"
                                                rows="4">{{ $asset->description }}</textarea>
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="old_category_id"
                                                value="{{ $asset->category_id }}">
                                            <label for="inputCategory">Category</label>
                                            <select class="form-control custom-select" name="category_id">
                                                @foreach ($categories as $category)

                                                <option value="{{ $category->id }}"
                                                    {{ ($asset->category_id == $category->id) ? "selected" : "" }}>
                                                    {{ $category->name }}</option>

                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                        </div>
                                        <div class="form-group">
                                            {{-- <input type="hidden" name="old_asset_status_id"
                                                value="{{ $asset->asset_status_id }}"> --}}
                                            <label for="inputStatus">Status</label>
                                            <select class="form-control custom-select" name="asset_status_id">
                                                @foreach ($asset_statuses as $asset_status)

                                                <option value="{{ $asset_status->id }}"
                                                    {{ ($asset->asset_status_id == $asset_status->id) ? "selected" : "" }}>
                                                    {{ $asset_status->name }}
                                                </option>

                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('asset_status_id') }}</span>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        {{-- IMAGE --}}
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">

                            <img src="{{ $asset->image }}" style="height; 100%;  width: 100%;" class="my-3"
                                id="editasset-image-preview">
                            <div class="form-group">
                                <label for="image" class="mt-2">Choose Image</label>
                                <input type="file" name="image" id="imageEditUpload" class=" form-control-file">
                            </div>
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end p-5">
                    <div class="col-auto">
                        <a href="javascript:history.back()" class="text-danger mr-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Edit Asset</button>
                    </div>
                </div>
            </div>
            </form>

            <!--====== </EDIT FORM> ======-->

        </section>
    </div>
</div>


@endsection
