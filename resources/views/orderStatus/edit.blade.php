@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit order state</h2>

    <form action="{{ route('orderStatus.update', $orderStatus->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Status" class="form-label">State</label>
            <input type="text" class="form-control" name="Status" value="{{ $orderStatus->Status }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update state</button>
    </form>
</div>
@endsection
