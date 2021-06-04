<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/dashboard" class="nav-link">Dashboard</a>
        </li>

    </ul>

    <!-- SEARCH FORM -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->
        @if(Auth::user()->name == 'Admin')
        @if (Route::has('register') )
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif @endif
        <li class="nav-item">
            <a href="/logout" class="nav-link">Logout</a>
        </li>
    </ul>
</nav>
