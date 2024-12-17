<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | @yield('title')</title>
        <link rel="icon" href="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->favicon) }}">
        
        @stack('before-styles')
            <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.css') }}"></link>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="{{ asset('backend/css/select2.css') }}"></link>
            <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}"></link>
        @stack('after-styles')
    </head>

    <body>
        <div class="admin-page">
            <div class="wrapper">
                <x-backend.sidebar></x-backend.sidebar>

                <div class="content">
                    @yield('content')
                </div>
            </div>

            @stack('before-scripts')
                <script src="{{ asset('backend/js/jquery.js') }}"></script>
                <script src="{{ asset('backend/js/select2.js') }}"></script>
                <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
                <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
                <script>
                    const uploadUrl = "{{ route('backend.ckeditor.upload') }}?_token={{ csrf_token() }}";
                </script>
                <script src="{{ asset('backend/js/chart.js') }}"></script>
                <script src="{{ asset('backend/js/main.js') }}"></script>
            @stack('after-scripts')
        </div>
    </body>
    
</html>