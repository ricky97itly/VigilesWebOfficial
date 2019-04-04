@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header ">
      <div class="title-vigiles font-weight-bold">
        {{__('Profilo')}}
        <a class="link-red" href="/profile/{{ $user->id }}/edit"><i class="fa fa-pen"></i></a>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <!-- Immagine profilo e nome cognome -->
        <div class="col-md-8 col-sm-8">
          <div class="list-inline">
            <img class="profilePic list-inline-item" src="{{ asset('img/profilePic.jpg')}}" alt="Your profile picture">
            <div class="list-inline-item align-middle">
              <h2>{{ $user->name }} {{ $user->surname }}</h2>
              <h5 class="address">{{ $user->address }}, {{ $user->street_number }}</h5>
            </div>
          </div>
        </div>

        <!-- Opzioni -->
        <div class="col-md-4 col-sm-4">
          <div class="list-group list-group-flush align-middle">
            <p class="list-group-item">Notifiche solo per codici
              <input class="checkbox-circle checkbox-green" type="checkbox" name="green" value="green">
              <input class="checkbox-circle checkbox-yellow" type="checkbox" name="yellow" value="yellow">
              <input class="checkbox-circle checkbox-red" type="checkbox" name="red" value="red">
            </p>
            <p class="list-group-item">Notifiche solo nella mia zona
              <input class="checkbox-circle" type="checkbox" name="zone_notifications" value="zone_notifications">
            </p>
            <p class="list-group-item">Disattiva tutte le notifiche
              <input class="checkbox-circle" type="checkbox" name="stop_notifications" value="stop_notifications">
            </p>
          </div>
        </div>
      </div>
      <hr>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="title-vigiles font-weight-bold">
              Amici
            </div>
          </div>
          <!-- Qui ci sarà un bel foreach per ciclare gli amicih -->
          <div class="col-md-6 col-sm-6 rounded shadow-sm p-3">
            <h5>Amico 1</h5>
          </div>
          <div class="col-md-6 col-sm-6 rounded shadow-sm p-3">
            <h5>Amico 2</h5>
          </div>
        </div>
      </div>
      <hr>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-sm-8 offset-md-3 offset-sm-2">
            <form method="POST" action="{{ action('ProfileController@destroy', $user->id) }}">
              @csrf
              @method('DELETE')
              <label for="deleteUser" class="d-flex text-vigiles justify-content-center mb-4">{{ $user->email }}</label>
              <button id="deleteUser" class="btn btn-block btn-vigiles font-weight-bold" type="submit" name="delete_user" onclick="confirmDelete()">
                {{__('Cancella account!')}}
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function confirmDelete() {
      confirm('Sei sicuro di voler eliminare il tuo account?')
    }
  </script>
@endsection
