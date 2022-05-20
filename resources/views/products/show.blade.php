@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 mt-2">
            <div class="d-flex justify-content-between">
                <h2>Last 5 Products</h2>
                <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <h3>Name:</h3>
                {{ $product->name }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <h3>Detail:</h3>
                <p>{{ $product->detail }}</p>
            </div>
        </div>
    </div>
@endsection
