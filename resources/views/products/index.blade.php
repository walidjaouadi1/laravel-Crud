@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 mt-2">
            <div class="d-flex justify-content-between">
                <h2>Last 5 Products</h2>
                <a class="btn btn-primary" href="{{ route('products.create') }}">Create New Product</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p> {{ $message }} </p>
        </div>
    @endif
    <table class="table table-bordered text-center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td> {{ $product->id }} </td>
                <td> {{ $product->name }} </td>
                <td> {{ $product->detail }} </td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $products->links() }}
@endsection
