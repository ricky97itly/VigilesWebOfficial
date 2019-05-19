<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      {{-- Questo metatag, che metto SOLO se sono autenticato, mi serve per passare al ProfileDelete.vue l'id dell'utente autenticato --}}
      @if (Auth::check())
        <meta name="user-id" content="{{ Auth::user()->id }}">
      @endif

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>Vigiles Milano | La sicurezza a portata di clic</title>

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- Navbar --}}
    @include('inc.navbar')

    {{-- Dic che contiene tutto il corpo dell'app --}}
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
      <main id="content" class="{{ Request::is('home*') ? '' : 'container py-4' }}">
        @yield('content')
      </main>

      {{-- Immagine di sfondo carina --}}
      <div class="row">
        <img id="colorFlow" src="{{ asset('/img/BG_Gradient.svg') }}" alt="color flow">
      </div>

    </div>

    {{-- Footer --}}
    @include('inc.footer')

    <!-- App.js -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  </body>
</html>
