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

        </div>
    </div>
</div>

@endsection
