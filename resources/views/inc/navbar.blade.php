<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-vigiles">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/home') }}">
      <img id="navLogo" src="{{ asset('/img/WhiteSmall.png') }}" alt="Vigiles White Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      @if (Auth::check() && Auth::user()->is_admin == 1 && Auth::user()->hasVerifiedEmail())
        <ul class="navbar-nav mr-auto">
          <li class="{{ Request::is('home') ? 'active font-weight-bold' : '' }} nav-item">
            <a class="nav-link" href="{{ url('/home') }}">Home</a>
          </li>
          <li class="{{ Request::is('admin') ? 'active font-weight-bold' : '' }} nav-item">
            <a class="nav-link" href="/admin">Operatore</a>
          </li>
          <form class="form-inline" action="{{ action('SearchController@search')}}" method="get">
            @csrf
            <input class="form-control mr-sm-2" type="search" placeholder="Cerca" aria-label="Cerca">
            <button class="btn btn-search" type="submit"><i class="fas fa-search"></i></button>
          </form>
        </ul>
      @elseif (Auth::check() && Auth::user()->hasVerifiedEmail())
        <ul class="navbar-nav mr-auto">
          <li class="{{ Request::is('home') ? 'active font-weight-bold' : '' }} nav-item">
            <a class="nav-link" href="{{ url('/home') }}">Home</a>
          </li>
          <li class="{{ Request::is('chat') ? 'active font-weight-bold' : '' }} nav-item">
            <a class="nav-link" href="{{ url('/chat') }}">Chat</a>
          </li>
          <li class="{{ Request::is('segnalazioni') ? 'active font-weight-bold' : '' }} nav-item">
            <a class="nav-link" href="{{ url('/reports') }}">Segnala</a>
          </li>
          <form class="form-inline ml-4" action="{{ action('SearchController@search')}}" method="get">
            @csrf
            <input class="form-control mr-sm-2" name="searchKey" type="search" placeholder="Cerca" title="Cerca un indirizzo, un tag o altre parole chiave">
            <button class="btn nav-link" type="submit"><i class="fas fa-search"></i></button>
          </form>
        </ul>
      @endif


      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="{{ Request::is('login') ? 'active font-weight-bold' : '' }} nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>

          @if (Route::has('register'))
          <li class="{{ Request::is('register') ? 'active font-weight-bold' : '' }} nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
          </li>
          @endif

        @elseif(Auth::user()->hasVerifiedEmail())
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="nav-link-dropdown dropdown-item mt-2 mb-2" href="/profile">
                <i class="fa fa-user"></i> {{ __('Profilo') }}
              </a>

              <a class="nav-link-dropdown dropdown-item mt-2 mb-2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out-alt"></i> {{ __('Logout') }}
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
