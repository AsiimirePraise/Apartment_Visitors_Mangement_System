// resources/views/auth/passwords/email.blade.php
@extends('layouts.auth', ['title' => 'Reset Password - PAVMS'])

@section('content')
<div class="text-center mb-4">
    <h5>Password Recovery</h5>
    <hr>
</div>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="mobile" class="form-label">Mobile Number</label>
        <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror"
               name="mobile" value="{{ old('mobile') }}" required>
        @error('mobile')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-success">RESET</button>
    </div>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}" class="text-decoration-none">Sign in</a>
    </div>
</form>
@endsection
