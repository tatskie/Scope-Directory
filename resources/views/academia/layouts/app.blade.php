<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tessol Licence Project') }} – @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @include('academia.includes.script')

    <!-- Styles -->
    @include('academia.includes.styles')
</head>
<body>
    <div class="wrapper" id="app">
        @include('academia.includes.header')

        <!-- Nav-bar -->


        <!-- Content -->
        <main class="contents-wrap">
          <div class="contents-sidebar">
            @include('academia.includes.navigation')
          </div>

          <div class="contents-main">
            @yield('content')
          </div>
        </main>

         <!-- Footer -->
        <div class="footer-wrap">
          @include('admin.includes.footer')
        </div>
        <!-- END Footer -->
        
    </div>
@yield('script')
</body>
</html>
