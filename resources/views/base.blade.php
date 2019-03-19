<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vigiles Web</title>
  </head>
  <body>
    @include('inc.navbar')
    @yield('content')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
  </body>
</html>
