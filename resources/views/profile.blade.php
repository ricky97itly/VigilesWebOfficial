@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header text-vigiles font-weight-bold">
      {{__('Profilo')}} <a class="link-red" href="{{ url('/profilo/modifica') }}"><i class="fa fa-pen"></i></a> 
    </div>
    <div class="card-body well">
      <div class="row">
        <!-- Immagine profilo e nome cognome -->
        <div class="col-md-8 col-sm-8">
          <div class="list-inline">
            <img class="profilePic list-inline-item" src="{{ asset('img/profilePic.jpg')}}" alt="Your profile picture">
            <div class="list-inline-item align-middle">
              <h2>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h2>
              <h5 class="address">{{ Auth::user()->address }}, {{ Auth::user()->street_number}}</h5>
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
            <a class="link-red list-group-item" href="{{ url('/profilo/cambia_password') }}">Modifica password</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
