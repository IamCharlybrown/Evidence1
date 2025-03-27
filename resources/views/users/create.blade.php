@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create User</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" class="form-control" value="{{ old('Name') }}" required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="Email" id="Email" class="form-control" value="{{ old('Email') }}" required>
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="Password" id="Password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Password_confirmation">Confirm Password</label>
            <input type="password" name="Password_confirmation" id="Password_confirmation" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role_id">Role</label>
            <select name="role_id" id="role_id" class="form-control" required>
                <option value="" disabled selected>Select Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->Name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Create User</button>
    </form>
</div>
@endsection
