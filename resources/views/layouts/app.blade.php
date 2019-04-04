<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vigiles Milano | La sicurezza a portata di clic</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('head_content')
</head>
<body>
  @include('inc.navbar')
  <div id="app">
    <div class="container mt-4">
      @include('inc.errors')
    </div>
    <main class="{{ Request::is('/') ? '' : 'container py-4' }}">
      @yield('content')
    </main>
  </div>
  @include('inc.footer');
</body>
</html>
