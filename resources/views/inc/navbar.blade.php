<nav class="navbar navbar-expand-lg navbar-dark bg-vigiles">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img id="navLogo" src="{{ asset('/img/WhiteSmall.png') }}" alt="Vigiles White Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li class="{{ Request::is('/') ? 'active font-weight-bold' : '' }} nav-item">
          <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>
        <li class="{{ Request::is('notifiche') ? 'active font-weight-bold' : '' }} nav-item">
          <a class="nav-link" href="{{ url('/notifiche') }}">Notifiche</a>
        </li>
        <li class="{{ Request::is('segnalazioni') ? 'active font-weight-bold' : '' }} nav-item">
          <a class="nav-link" href="{{ url('/segnalazioni') }}">Segnala</a>
        </li>
        <li class="{{ Request::is('cerca') ? 'active font-weight-bold' : '' }} nav-item">
          <a class="nav-link" href="{{ url('/cerca') }}">Cerca</a>
        </li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="{{ Request::is('login') ? 'active font-weight-bold' : '' }} nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>

          @if (Route::has('register'))
          <li class="{{ Request::is('register') ? 'active font-weight-bold' : '' }} nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif

          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
