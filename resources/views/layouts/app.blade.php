<!DOCTYPE html>
<html lang="it" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Vigiles Web</title>
</head>
<body>
  @section('navbar')
  <nav class="navbar navbar-expand-lg navbar-light bg-vigiles">
    <a class="navbar-brand ml-auto" href="#"><img id="navLogo" src="{{ asset('/img/White0.5x.png') }}" alt="Vigiles White Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Notifiche</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Segnalazione</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cerca</a>
        </li>
      </ul>
    </div>
  </nav>
  @show

  <div class="container">
    @yield('content')
  </div>
  <!-- Richiamo css/bootstrap -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</body>
</html>
