@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Client</h2>

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Name" class="form-label">Client Name</label>
            <input type="text" class="form-control" id="Name" name="Name" value="{{ $client->Name }}" required>
        </div>
        <div class="mb-3">
            <label for="Client_Number" class="form-label">Client Number</label>
            <input type="number" class="form-control" id="Client_Number" name="Client_Number" value="{{ $client->Client_Number }}" required>
        </div>
        <div class="mb-3">
            <label for="FiscalData" class="form-label">Fiscal Data</label>
            <input type="text" class="form-control" id="FiscalData" name="FiscalData" value="{{ $client->FiscalData }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Client</button>
    </form>
</div>
@endsection
