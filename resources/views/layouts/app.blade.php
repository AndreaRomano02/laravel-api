<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.layout.head')

    <style>
        body {
            display: none
        }
    </style>
</head>

<body>
    <div id="app">

        {{-- # Navbar --}}
        @include('includes.layout.navbar')



        {{-- # Main Content --}}
        <main class="@yield('content-class')">
            {{-- # Alert  --}}
            @if (session('message'))
                <div class="alert alert-{{ session('type') ? session('type') : 'info' }} alert-dismissible fade show"
                    role="alert">
                    <p>{{ session('message') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>

@yield('scripts')

</html>
