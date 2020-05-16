@extends('layouts.requisition')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block my-3">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="row justify-content-center">
    <div class="col-xl-4 col-lg-6 col-md-6">
        <section class="content">

            <!-- Default box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Request Form</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="reservation">Category:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-archive"></i>
                                </span>
                            </div>
                            <select class="form-control custom-select" name="category_id">
                                @foreach ($categories as $category)

                                <option value="{{ $category->id }}">
                                    {{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCategory">Asset:</label>
                        <div class="select2-blue">
                            <select class="select2" multiple="multiple" data-dropdown-css-class="select2-blue"
                                data-placeholder="Select Asset" style="width: 100%;">
                                @foreach ($assets as $asset)
                                <option value="{{ $asset->id }}">{{ $asset->name }} - {{ $asset->code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="text-danger">{{ $errors->first('asset_id') }}</span>
                        {{-- </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="reservation">Date Needed:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" name="requested_date" id="reservation">
                            <span class="text-danger">{{ $errors->first('requested_date') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="requestNote">Notes:</label>
                        <textarea id="requestNote" name="notes" class="form-control" rows="4"></textarea>
                        <span class="text-danger">{{ $errors->first('notes') }}</span>
                    </div>
                    <div class="d-flex justify-content-end p-0">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </section>
    </div>

</div>


@endsection
