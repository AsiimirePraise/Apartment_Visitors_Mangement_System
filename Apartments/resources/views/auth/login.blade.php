@extends('layouts/app', ['activePage' => 'login', 'title' => 'Apartment Visitors Management System'])

<!-- @section('content') -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm my-5">
                <div class="card-body p-5">
                    <div class="text-center">
                        <h3 class="text-primary mb-3 text-sm ">Pearls Apartment Visitor Management System<br>(PAVMS)</h3>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="email">User Name</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <a href="{{ route('password.request') }}" class="text-danger">Forgotten Password?</a>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg btn-block">SIGN IN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        border-radius: 8px;
        background-color: white;
    }
    .text-primary {
        color: #0d6efd !important;
    }
    .text-danger {
        color: #dc3545 !important;
    }
    .btn-success {
        background-color: #4CAF50;
        border-color: #4CAF50;
    }
</style>
@endpush
