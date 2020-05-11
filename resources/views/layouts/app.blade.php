<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@hasSection('title') @yield('title') :: @endif{{ config('app.name') }}</title>
    <meta name="description" content="{{ config('ifkorea.meta.description') }}">
    <meta name="keywords" content="{{ config('ifkorea.meta.keywords') }}">
    <meta name="canonical" content="{{ URL::current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@hasSection('title') @yield('title') :: @endif{{ config('app.name') }}">
    <meta property="og:description" content="{{ config('ifkorea.meta.description') }}">
    <meta property="og:image" content="{{ asset('images/ifkorea_designs/signiture_kor_long_vertical_color.png') }}">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta name="naver-site-verification" content="391cb1cd6f204aa3ee117a2ab15e76538a657f6d">
    <meta name="google-site-verification" content="nbUwafsZxvtrFyx1IfgQ3PzDdZSkexSyZn_V96jNT6M">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166096618-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-166096618-1');
    </script>
    @yield('resources')
</head>
<body>
@include('components.navbar')
<div class="container">
@yield('content')
</div>
</body>
</html>
