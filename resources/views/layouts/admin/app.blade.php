<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} - {{ $title ?? '' }}</title>

    <link rel="stylesheet" href="{{ getAdminAsset('font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('font/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/bootstrap-float-label.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/component-custom-switch.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/select2-bootstrap.min.css') }}" />
    @stack('header')
    <link rel="stylesheet" href="{{ getAdminAsset('css/dore.light.blue.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/main.css') }}" />

    @livewireStyles
</head>


<body class="menu-sub-hidden show-spinner rounded {{ $body_class ?? '' }}" id="{{ $body_id ?? 'app-container' }}">

    {{-- Navbar Start --}}
    @include('admin.parts.topnav')
    {{-- Navbar End --}}

    {{-- Sidenav Start --}}
    {{-- @include('parts.sidenav') --}}
    <x-side-nav />
    {{-- Sidenav End --}}

    {{-- Main Content Start --}}
    <main class="default-transition">
        @yield('content')
    </main>
    {{-- Main Content End --}}

    {{-- Footer Start --}}
    @include('admin.parts.footer')
    {{-- Footer End --}}

    {{-- Logout Form Start --}}
    <form action="{{ route('logout') }}" method="post" id="logoutForm">
        @csrf
    </form>
    {{-- Logout Form End --}}

    @livewireScripts

    <script src="{{ getAdminAsset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ getAdminAsset('js/dore.script.js') }}"></script>
    @stack('footer')
    <script src="{{ getAdminAsset('js/scripts.single.theme.js') }}"></script>
</body>

</html>
