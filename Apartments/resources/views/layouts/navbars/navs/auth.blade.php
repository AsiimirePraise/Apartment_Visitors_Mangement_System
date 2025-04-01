<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            AVMS
        </a>

        <div class="d-flex align-items-center">
            @guest
            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">
                Sign In
            </a>
            @endguest
        </div>
    </div>
</nav>
