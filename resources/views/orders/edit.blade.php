@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit order</h2>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Client_ID" class="form-label">Client</label>
            <select class="form-select" name="Client_ID" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $order->Client_ID ? 'selected' : '' }}>
                        {{ $client->Name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Status_ID" class="form-label">State</label>
            <select class="form-select" name="Status_ID" required>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" {{ $status->id == $order->Status_ID ? 'selected' : '' }}>
                        {{ $status->Status }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="InvoiceNumber" class="form-label">num Facture</label>
            <input type="text" class="form-control" name="InvoiceNumber" value="{{ $order->InvoiceNumber }}" required>
        </div>

        <div class="mb-3">
            <label for="DateTime" class="form-label">Date and Hour</label>
            <input type="datetime-local" class="form-control" name="DateTime" value="{{ date('Y-m-d\TH:i', strtotime($order->DateTime)) }}" required>
        </div>

        <div class="mb-3">
            <label for="DeliveryAddress" class="form-label">Delivery Deliver</label>
            <input type="text" class="form-control" name="DeliveryAddress" value="{{ $order->DeliveryAddress }}" required>
        </div>

        <div class="mb-3">
            <label for="Notes" class="form-label">Notes</label>
            <textarea class="form-control" name="Notes" rows="3">{{ $order->Notes }}</textarea>
        </div>

        <div class="mb-3">
            <label for="Delivery_Photo_ID" class="form-label">Delivery Photo</label>
            <select class="form-select" name="Delivery_Photo_ID">
                <option value="">Sin foto</option>
                @foreach($deliveryPhotos as $photo)
                    <option value="{{ $photo->id }}" {{ $photo->id == $order->Delivery_Photo_ID ? 'selected' : '' }}>
                        Foto {{ $photo->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">save changes</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">cancel</a>
    </form>
</div>
@endsection
