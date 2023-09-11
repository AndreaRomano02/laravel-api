<nav id="layout-nav" class="navbar navbar-expand-md  navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('guest.home') }}">
            <img class="logo" src="{{ asset('logo.png') }}" alt="LOGO">
            <h4>ANDREA ROMANO</h4>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item fs-5">
                    <a class="nav-link @if (request()->routeIs('guest.home')) active @endif"
                        href="{{ route('guest.home') }}">{{ __('Home') }}</a>
                </li>
                @auth
                    <li class="nav-item fs-5">
                        <a class="nav-link @if (request()->routeIs('admin.projects*')) active @endif"
                            href="{{ route('admin.projects.index') }}">Projects</a>
                    </li>
                    <li class="nav-item fs-5">
                        <a class="nav-link @if (request()->routeIs('admin.types*')) active @endif"
                            href="{{ route('admin.types.index') }}">Types</a>
                    </li>
                    <li class="nav-item fs-5">
                        <a class="nav-link @if (request()->routeIs('admin.technologies*')) active @endif"
                            href="{{ route('admin.technologies.index') }}">Technologies</a>
                    </li>
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->

            {{-- # Social --}}
            <div class="social text-white d-flex gap-3">
                <a href="https://www.linkedin.com/in/andrea-romano-b34939227/" target="_blank"><i
                        class="fab fa-linkedin"></i>
                </a>
                <a href="https://github.com/AndreaRomano02" target="_blank"><i class="fab fa-github"></i>
                </a>
                <a href="https://www.instagram.com/andrea_romano___/"target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/andrea.romano.773981/" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
            </div>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.home') }}">Home</a>
                            <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
