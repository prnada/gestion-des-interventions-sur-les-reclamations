<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Service d'intervention spécialisé</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="asset{{('css/fonts.googleapis.com_css2.css')}}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/offcanvas-navbar.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/offcanvas-navbar.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
            class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

        @include('layouts.sidebar');

        <div class="flex-1 flex flex-col overflow-scroll">

            @include('layouts.header')

            {{-- @if(\Session::has('success'))
            <div class="text-green-600 pt-5 pl-5">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            @endif --}}

            {{-- @if(\Session::has('error'))
            <div class="text-green-600 pt-5 pl-5">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
            @endif

            @if ($errors->any())
            <div class="text-red-600  pt-5 pl-5">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}

            {{ $slot }}

        </div>
    </div>
    <!--      -->
    <script src="{{asset('js/unpkg.com_flowbite.js')}}"></script>
    <script src="{{asset('js/cdnjs.cloudflare.com_ajax_libs_popper.min.js')}}"></script>
    <script src="{{asset('is/maxcdn_js_bootstrap.min.js')}}"></script>
    <!--      -->
</body>

</html>