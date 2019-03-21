<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vigiles Web</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include('inc.navbar')
    <div class="container mt-4">
      @yield('content')
    </div>

    <footer id="footer" class="text-center text-light">
      <p class="font-weight-bold">Copyright 2018 &copy; Vigiles Staff</p>
    </footer>
  </body>
</html>
