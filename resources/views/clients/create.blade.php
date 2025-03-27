@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Crear Cliente</h2>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Name" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control" id="Name" name="Name" required>
        </div>
        <div class="mb-3">
            <label for="Client_Number" class="form-label">Número de Cliente</label>
            <input type="number" class="form-control" id="Client_Number" name="Client_Number" required>
        </div>
        <div class="mb-3">
            <label for="FiscalData" class="form-label">Datos Fiscales</label>
            <input type="text" class="form-control" id="FiscalData" name="FiscalData" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar Cliente</button>
    </form>
</div>
@endsection
