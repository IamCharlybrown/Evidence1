@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Crear Estado de Orden</h2>

    <form action="{{ route('orderStatus.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Status" class="form-label">Estado</label>
            <input type="text" class="form-control" name="Status" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Estado</button>
    </form>
</div>
@endsection
