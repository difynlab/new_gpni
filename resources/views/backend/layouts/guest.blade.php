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
            <link rel="stylesheet" href="{{ asset('backend/css/guest.css') }}"></link>
        @stack('after-styles')
    </head>

    <body>
        <div class="guest-page">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-5">
                        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->guest_image) }}" alt="Image" class="image">
                    </div>
                    <div class="col-7">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @stack('before-scripts')
            <script src="{{ asset('backend/js/jquery.js') }}"></script>
            <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
            <script src="{{ asset('backend/js/captcha.js') }}"></script>
            <script>
                $(".toggle-password").click(function () {
                    $(this).toggleClass("bi-eye-slash-fill bi-eye-fill");
                    
                    if($(this).prev().attr("type") == "password") {
                        $(this).prev().attr("type", "text");
                    }
                    else {
                        $(this).prev().attr("type", "password");
                    }
                });
            </script>
        @stack('after-scripts')
    </body>
</html>