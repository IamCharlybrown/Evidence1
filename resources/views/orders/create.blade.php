@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Create order</h2>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Client_ID" class="form-label">Client</label>
            <select class="form-select" name="Client_ID" required>
                <option value="">Select a Client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->Name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Status_ID" class="form-label">State</label>
            <select class="form-select" name="Status_ID" required>
                <option value="">Select a State</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->Status }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="InvoiceNumber" class="form-label">Receipt number</label>
            <input type="text" class="form-control" name="InvoiceNumber" required>
        </div>

        <div class="mb-3">
            <label for="DateTime" class="form-label">Date and hour</label>
            <input type="datetime-local" class="form-control" name="DateTime" required>
        </div>

        <div class="mb-3">
            <label for="DeliveryAddress" class="form-label">Delivery Address</label>
            <input type="text" class="form-control" name="DeliveryAddress" required>
        </div>

        <div class="mb-3">
            <label for="Notes" class="form-label">Notes</label>
            <textarea class="form-control" name="Notes"></textarea>
        </div>

        <div class="mb-3">
            <label for="Delivery_Photo_ID" class="form-label">Delivery photo</label>
            <select class="form-select" name="Delivery_Photo_ID">
                <option value="">selecct a Delivery photo</option>
                @foreach($deliveryPhotos as $photo)
                    <option value="{{ $photo->id }}">{{ $photo->PhotoURL }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
