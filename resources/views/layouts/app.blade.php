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

      <!-- Favicon -->
      <link rel="icon" href="{{ asset('img/RW.png') }}"/>

      <title>Vigiles Milano | La sicurezza a portata di clic</title>

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- Navbar --}}
    @include('inc.navbar')

    {{-- Div che contiene tutto il corpo dell'app --}}
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

    <!-- JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3.32.1/dist/algoliasearchLite.js" integrity="sha256-pMaJf0I78weeXGkRMBDO6jSulxC/q3sb0aPdtV2N8n0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@3.2.0" integrity="sha256-/8usMtTwZ01jujD7KAZctG0UMk2S2NDNirGFVBbBZCM=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{ asset('js/algolia.js') }}" defer></script> --}}
    @stack('script')
  </body>
</html>
