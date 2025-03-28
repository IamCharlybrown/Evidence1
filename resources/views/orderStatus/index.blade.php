@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Order State</h2>
    <a href="{{ route('orderStatus.create') }}" class="btn btn-primary mb-3">Create a new State</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>State</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderStatuses as $orderStatus)
                    <tr>
                        <td>{{ $orderStatus->id }}</td>
                        <td>{{ $orderStatus->Status }}</td>
                        <td>
                            <a href="{{ route('orderStatus.edit', $orderStatus->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('orderStatus.destroy', $orderStatus->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
