<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | @yield('title')</title>
        <link rel="icon" href="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->favicon) }}">
        
        @stack('before-styles')
            <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
        @stack('after-styles')
    </head>

    <body>
        <x-frontend.navigation></x-frontend.navigation>
        @yield('content')
        <x-frontend.footer></x-frontend.footer>

        @stack('before-scripts')
            <script src="{{ asset('frontend/js/jquery.js') }}"></script>
            <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
            <script src="{{ asset('frontend/js/main.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        @stack('after-scripts')
    </body>
    
</html>