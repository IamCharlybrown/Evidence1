@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Role</h1>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Name">Role Name</label>
            <input type="text" name="Name" id="Name" class="form-control" value="{{ old('Name', $role->Name) }}" required>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Update Role</button>
    </form>
</div>
@endsection
