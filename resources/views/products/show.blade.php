@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Details</h1>

        <h3>Products</h3>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr>
                        <td>{{ $product->Name }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>${{ number_format($product->Price, 2) }}</td>
                        <td>${{ number_format($product->Price * $product->pivot->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
