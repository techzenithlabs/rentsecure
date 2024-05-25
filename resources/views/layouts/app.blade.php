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

<script>
        var baseURL = "{{ url('/') }}";
</script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <section class="main-wrapper">
                @switch(Auth::user()->role_id)
                @case(1){{-- SuperAdmin --}}
                @include('layouts.admin.sidebar')
                  @break
                @case(2){{-- Landlord --}}
                @include('layouts.landlord.sidebar')
                  @break
                @case(3){{-- Tenant --}}
                @include('layouts.tenant.sidebar')
                  @break
               @endswitch



               <!-----Include main layout--->
               @switch(Auth::user()->role_id)
               @case(1){{-- SuperAdmin --}}
               @include('includes.admin.dashboard')
                 @break
               @case(2){{-- Landlord --}}
               @include('includes.landlord.content')
                 @break
               @case(3){{-- Tenant --}}
               @include('includes.tenant.content')
                 @break
              @endswitch


               <!-----incude main layout-->



            </section>
        </div>
@include('includes.footer')

