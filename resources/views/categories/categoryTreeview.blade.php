@extends('layouts.dashboard')
@section('content')
<div class="container border border-primary rounded">
    <div class="row">
        <div class="col-12 bg-primary p-2">
            <h2 class="mx-3">Categories</h2>
        </div>
    </div>
    <div class="row m-5">
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h4 class="mb-3">Category List</h4>
                    <ul id="tree1">

                        @foreach($categories as $category)
                        <li>

                            {{ $category->name }}
                            @if(count($category->childs))
                            @include('categories.manageChild',['childs' => $category->childs])
                            @endif

                        </li>
                        @endforeach
                    </ul>
                </div>
                @can('edit-category')
                <div class="col-md-6">
                    <h4 class="mb-3">Add New Category</h4>


                    {!! Form::open(['action'=>'CategoryController@addCategory', 'method' => 'POST']) !!}


                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        {!! Form::label('Name:') !!}
                        {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name'])
                        !!}
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>


                    <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                        {!! Form::label('Parent Category:') !!}
                        {!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control',
                        'placeholder'=>'Select Parent Category']) !!}
                        <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-success">Add New</button>
                    </div>


                    {!! Form::close() !!}
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<script src="{{  asset('js/app.js') }}"></script>
@endsection
