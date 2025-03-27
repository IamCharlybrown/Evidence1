@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Fotos de Entrega</h2>
    <a href="{{ route('deliveryPhotos.create') }}" class="btn btn-primary mb-3">Crear Nueva Foto de Entrega</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Estado</th>
                    <th>URL de Foto</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deliveryPhotos as $photo)
                    <tr>
                        <td>{{ $photo->id }}</td>
                        <td>{{ $photo->status->Status }}</td>
                        <td>{{ $photo->PhotoURL }}</td>
                        <td>{{ $photo->Type }}</td>
                        <td>
                            <a href="{{ route('deliveryPhotos.edit', $photo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('deliveryPhotos.destroy', $photo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
