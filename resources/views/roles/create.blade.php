@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Role</h1>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Name">Role Name</label>
            <input type="text" name="Name" id="Name" class="form-control" value="{{ old('Name') }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Create Role</button>
    </form>
</div>
@endsection
