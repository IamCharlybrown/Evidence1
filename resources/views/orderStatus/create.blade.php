@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Create order State</h2>

    <form action="{{ route('orderStatus.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Status" class="form-label">State</label>
            <input type="text" class="form-control" name="Status" required>
        </div>

        <button type="submit" class="btn btn-primary">Save state</button>
    </form>
</div>
@endsection
