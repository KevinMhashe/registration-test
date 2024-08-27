<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/Lihpikihna-Logo.png') }}" alt="Laravel Logo" class="nav-logo">
            <style>
                .nav-logo {
                    margin-left: -5rem;
                    margin-top: 2rem;
                    width: 350px;
                    height: auto;
                    max-width: 100%;
                }

                @media (max-width: 768px) {
                    .nav-logo {
                        margin-top: 0;
                        margin-left: 0;
                        width: 100px;
                    }
                }
            </style>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNavbar"
            aria-controls="mobileNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Add links here -->
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="btn btn-outline-dark me-2" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark" href="{{ url('register') }}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="collapse d-lg-none" id="mobileNavbar">
        <div class="pt-2 pb-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('partners') }}">Partners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('subscription') }}">Subscription Plans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://lihpikihna.org/" target="_blank">Our Website</a>
                </li>
                @guest
                    <li class="nav-item mt-3">
                        <a class="nav-link btn btn-outline-dark mb-2" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-dark" href="{{ url('register') }}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-top">
            @auth
                <div class="px-4">
                    <div class="font-weight-bold">{{ Auth::user()->name }}</div>
                    <div class="text-muted">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        {{ __('Profile') }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
