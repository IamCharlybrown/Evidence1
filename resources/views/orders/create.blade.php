@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Crear Pedido</h2>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Client_ID" class="form-label">Cliente</label>
            <select class="form-select" name="Client_ID" required>
                <option value="">Seleccione un Cliente</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->Name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Status_ID" class="form-label">Estado</label>
            <select class="form-select" name="Status_ID" required>
                <option value="">Seleccione un Estado</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->Status }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="InvoiceNumber" class="form-label">Número de Factura</label>
            <input type="text" class="form-control" name="InvoiceNumber" required>
        </div>

        <div class="mb-3">
            <label for="DateTime" class="form-label">Fecha y Hora</label>
            <input type="datetime-local" class="form-control" name="DateTime" required>
        </div>

        <div class="mb-3">
            <label for="DeliveryAddress" class="form-label">Dirección de Entrega</label>
            <input type="text" class="form-control" name="DeliveryAddress" required>
        </div>

        <div class="mb-3">
            <label for="Notes" class="form-label">Notas</label>
            <textarea class="form-control" name="Notes"></textarea>
        </div>

        <div class="mb-3">
            <label for="Delivery_Photo_ID" class="form-label">Foto de Entrega</label>
            <select class="form-select" name="Delivery_Photo_ID">
                <option value="">Seleccione una Foto de Entrega</option>
                @foreach($deliveryPhotos as $photo)
                    <option value="{{ $photo->id }}">{{ $photo->PhotoURL }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Pedido</button>
    </form>
</div>
@endsection
