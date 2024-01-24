<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Service d'intervention spécialisé</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/fonts.googleapis.com_css2.css')}}">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('css/maxcdn.bootstrapcdn.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/offcanvas-navbar.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/offcanvas-navbar.js') }}" defer></script>
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    <script src="{{asset('js/code.jquery.min.js')}}"></script>
    <script src="{{asset('js/cdnjs.cloudflare.com_ajax_libs_popper.min.js')}}"></script>
    <script src="{{asset('is/maxcdn_js_bootstrap.min.js')}}"></script>
</body>

</html>