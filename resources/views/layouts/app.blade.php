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
      {{-- @yield('head_content') --}}
  </head>
  <body>
    <script src="js/sweetalert.min.js"></script>

    {{-- Navbar --}}
    @include('inc.navbar')
    <div id="app">

      {{-- Sweet alert --}}
      @include('sweet::alert')

      {{-- Errori --}}
      @if ($errors->any())
        <div class="container mt-4">
          @include('inc.errors')
        </div>
      @endif

      {{-- Pagine dinamiche, se è la home non voglio classi, se invece è un'altra pagina voglio class container --}}
      <main id="content" class="{{ Request::is('/') ? '' : 'container py-4' }}">
        @yield('content')
      </main>
    </div>

    {{-- Footer --}}
    @include('inc.footer')
  </body>
</html>
