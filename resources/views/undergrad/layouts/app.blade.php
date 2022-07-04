<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tessol Licence Project') }} – @yield('title')</title>

    <!-- Scripts -->
    @include('undergrad.includes.script')

    <!-- Styles -->
    @include('undergrad.includes.styles')
</head>
<body>
    <div class="wrapper" id="app">
        @include('undergrad.includes.header')

        <!-- Nav-bar -->


        <!-- Content -->
        <main class="contents-wrap">
          <div class="contents-sidebar">
            @include('undergrad.includes.navigation')
          </div>

          <div class="contents-main">
            @yield('content')
          </div>
        </main>
    </div>
@yield('script')
</body>
</html>
