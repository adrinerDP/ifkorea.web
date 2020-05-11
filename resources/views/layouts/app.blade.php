<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@hasSection('title') @yield('title') :: @endif {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('resources')
</head>
<body>
@include('components.navbar')
<div class="container">
@yield('content')
</div>
</body>
</html>
