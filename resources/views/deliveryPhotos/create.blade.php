@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Crear Foto de Entrega</h2>

    <form action="{{ route('deliveryPhotos.store') }}" method="POST">
        @csrf
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
            <label for="PhotoURL" class="form-label">URL de Foto</label>
            <input type="url" class="form-control" name="PhotoURL" required>
        </div>

        <div class="mb-3">
            <label for="Type" class="form-label">Tipo</label>
            <input type="text" class="form-control" name="Type" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Foto de Entrega</button>
    </form>
</div>
@endsection
