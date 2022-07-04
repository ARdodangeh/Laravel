@extends('layouts.app')
@section('content')
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="Firstname" class="form-label">First name</label>
        <input value="{{ old('first_name', $user->first_name) }}" name="first_name" type="text" class="form-control" id="Firstname">
        @error('first_name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="Lastname" class="form-label">Last name</label>
        <input value="{{ old('last_name', $user->last_name) }}" name="last_name" type="text" class="form-control" id="Lastname">
        @error('last_name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="Email" class="form-label">Email address</label>
        <input value="{{ old('email', $user->email) }}" name="email" type="email" class="form-control" id="Email" aria-describedby="Help">
        <div id="Help" class="form-text">We'll never share your email with anyone else.</div>
        @error('email')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input value="{{ old('password') }}" name="password" type="password" class="form-control" id="Password">
        @error('password')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="Check">
        <label class="form-check-label" for="Check">Check me out</label>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection