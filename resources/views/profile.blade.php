@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header ">
      <div class="title-vigiles font-weight-bold">
        {{__('Profilo')}}
        <a class="link-red" href="/profile/{{ $user->id }}/edit"><i class="btn btn-vigiles-sm fa fa-pen"></i></a>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <!-- Immagine profilo e nome cognome -->
        <div class="col-md-6 col-sm-6 h-100 align-self-center">
          <div class="list-inline">
            <img class="profile-pic border-vigiles list-inline-item" src="../storage/app/avatars/{{ $user->avatar }}" alt="Immagine profilo" />
            <ul class="list-inline-item align-middle">
              <li><h2>{{ $user->name }} {{ $user->surname }}</h2></li>
              <li><h5 class="text-muted">{{ $user->address }}, {{ $user->street_number }}</h5></li>
              <li><a class="link-red" href="/avatar">Modifica immagine</a></li>
            </ul>
          </div>
        </div>

        <!-- Opzioni -->
        {{-- <div class="col-md-4 offset-md-1 col-sm-4 h-100 align-self-center">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Notifiche solo per codici
              <input class="checkbox-circle checkbox-green" type="checkbox" name="green" value="green">
              <input class="checkbox-circle checkbox-yellow" type="checkbox" name="yellow" value="yellow">
              <input class="checkbox-circle checkbox-red" type="checkbox" name="red" value="red">
            </li>
            <li class="list-group-item">Notifiche solo nella mia zona
              <input class="checkbox-circle" type="checkbox" name="zone_notifications" value="zone_notifications">
            </li>
            <li class="list-group-item">Disattiva tutte le notifiche
              <input class="checkbox-circle" type="checkbox" name="stop_notifications" value="stop_notifications">
            </li>
          </ul>
        </div> --}}
      </div>

      <hr>

      <div class="row">
        <div class="col-md-6 col-sm-8 offset-md-3 offset-sm-2">
          <label for="deleteUser" class="d-flex text-vigiles justify-content-center mb-4">{{ $user->email }}</label>
          {{-- Questo tag personalizzato (vedi app.js) carica il component ProfileDelete.vue dalla cartella js/components --}}
          <profileDelete></profileDelete>
        </div>
      </div>
    </div>
  </div>
@endsection
