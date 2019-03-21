<!-- @section('navbar') -->
<nav class="navbar navbar-expand-lg navbar-dark bg-vigiles">
  <a class="navbar-brand ml-auto" href="{{ url('/') }}"><img id="navLogo" src="{{ asset('/img/WhiteSmall.png') }}" alt="Vigiles White Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav">
      <li class="{{ Request::is('/') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{ url('/') }}">Home</a>
      </li>
      <li class="{{ Request::is('notifiche') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{ url('/notifiche') }}">Notifiche</a>
      </li>
      <li class="{{ Request::is('segnalazioni') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{ url('/segnalazioni') }}">Segnala</a>
      </li>
      <li class="{{ Request::is('cerca') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{ url('/cerca') }}">Cerca</a>
      </li>
    </ul>
  </div>
</nav>
<!-- @show -->
