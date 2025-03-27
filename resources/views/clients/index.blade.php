@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Clientes</h2>
    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Crear Cliente</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Número de Cliente</th>
                    <th>Datos Fiscales</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->Name }}</td>
                        <td>{{ $client->Client_Number }}</td>
                        <td>{{ $client->FiscalData }}</td>
                        <td>
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="d-inline">
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
