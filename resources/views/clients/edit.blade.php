@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Cliente</h2>

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Name" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control" id="Name" name="Name" value="{{ $client->Name }}" required>
        </div>
        <div class="mb-3">
            <label for="Client_Number" class="form-label">Número de Cliente</label>
            <input type="number" class="form-control" id="Client_Number" name="Client_Number" value="{{ $client->Client_Number }}" required>
        </div>
        <div class="mb-3">
            <label for="FiscalData" class="form-label">Datos Fiscales</label>
            <input type="text" class="form-control" id="FiscalData" name="FiscalData" value="{{ $client->FiscalData }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
    </form>
</div>
@endsection
