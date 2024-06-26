<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{asset('public/assets/css/all.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('public/assets/css/owl.carousel.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('public/assets/css/owl.theme.default.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}"/>
        <link rel="stylesheet" href="{{asset('public/assets/css/responsive.css')}}"/>
        <link rel="stylesheet" href="{{asset('public/assets/css/select2.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('public/build/tailwind.css') }}">

        <link rel="stylesheet" href="{{ asset('public/assets/css/custom.css') }}">
        <!-- Scripts -->

       <script src="{{ asset('public/build/app.js') }}" defer></script>
<script>
        var baseURL = "{{ url('/') }}";
</script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')


            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
