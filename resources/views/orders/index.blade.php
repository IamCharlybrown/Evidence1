@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Orders</h2>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create new order</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>State</th>
                    <th>Reciept</th>
                    <th>Date and hour</th>
                    <th>Delivery Address</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->client->Name }}</td>
                        <td>{{ $order->status->Status }}</td>
                        <td>{{ $order->InvoiceNumber }}</td>
                        <td>{{ $order->DateTime }}</td>
                        <td>{{ $order->DeliveryAddress }}</td>
                        <td>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
