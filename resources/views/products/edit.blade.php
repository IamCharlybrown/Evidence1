@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" value="{{ $product->Name }}" required>
            </div>
            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" id="Description" name="Description" required>{{ $product->Description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="Price" class="form-label">Price</label>
                <input type="number" class="form-control" id="Price" name="Price" value="{{ $product->Price }}" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="Stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="Stock" name="Stock" value="{{ $product->Stock }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update Product</button>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Product Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->Name }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $product->Description }}</p>
                <p class="card-text"><strong>Price:</strong> ${{ number_format($product->Price, 2) }}</p>
                <p class="card-text"><strong>Stock:</strong> {{ $product->Stock }}</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection