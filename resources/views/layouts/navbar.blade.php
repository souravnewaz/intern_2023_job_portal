<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <div class="d-flex justify-content-between">
            <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>
        </div>
        @if(auth()->check())
        <div>
            @if(auth()->user()->role == 'admin')
                <a href="" class="btn btn-primary btn-sm">Post Job</a>
                <a href="" class="btn btn-light btn-sm">Jobs</a>
            @endif
            <a href="" class="btn btn-light btn-sm">Applications</a>
            <a href="{{ route('logout') }}" class="btn btn-light btn-sm">Logout</a>
        </div>
        @else
        <div>
            <a class="btn btn-outline-primary btn-sm" href="{{ route('login') }}">Login</a>
            <a class="btn btn-outline-primary btn-sm" href="{{ route('register') }}">Signup</a>
        </div>
        @endif
    </div>
</nav>