@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Pedido</h2>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Client_ID" class="form-label">Cliente</label>
            <select class="form-select" name="Client_ID" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $order->Client_ID ? 'selected' : '' }}>
                        {{ $client->Name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Status_ID" class="form-label">Estado</label>
            <select class="form-select" name="Status_ID" required>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" {{ $status->id == $order->Status_ID ? 'selected' : '' }}>
                        {{ $status->Status }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="InvoiceNumber" class="form-label">Número de Factura</label>
            <input
