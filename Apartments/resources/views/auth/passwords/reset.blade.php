@extends('layouts.auth', ['title' => 'Reset Password'])

@section('content')
<div class="text-center mb-4">
    <h5>Reset Password</h5>
</div>

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">E-MAIL ADDRESS</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">
            Send Password Reset Link
        </button>
    </div>
</form>

<div class="text-center mt-3">
    <a href="{{ route('login') }}" class="text-decoration-none">
        <i class="fas fa-arrow-left me-1"></i> Back to Sign In
    </a>
</div>
@endsection
