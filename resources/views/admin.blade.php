@extends('layouts.app')

@section('content')
  <h2 class="title-vigiles font-weight-bold">Segnalazioni in stato di attesa</h2>
  @if (count($reports) > 0)
    <ul class="list-group">
      {{-- Header --}}
      <li class="list-group-item list-header">
        <div class="row text-vigiles font-weight-bold">
          <div class="col-md-3 align-self-center">
            Username
          </div>
          <div class="col-md-3 align-self-center">
            Titolo
          </div>
          <div class="col-md-4 align-self-center">
            Indirizzo
          </div>
          <div class="col-md-2 align-self-center">
            {{-- Empty --}}
          </div>
        </div>
      </li>
      {{-- Lista segnalazioni in attesa --}}
      @foreach($reports as $report)
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-3 align-self-center">
                {{ $report->user_name }} {{ $report->user_surname }}
              </div>
              <div class="col-md-3 align-self-center">
                {{ $report->title }}
              </div>
              <div class="col-md-4 align-self-center">
                {{ $report->address }}, {{ $report->street_number }}
              </div>
              <div class="col-md-2 align-self-center">
                <a class="d-flex btn btn-link-red" href="/reports/{{ $report->id }}/edit">Dettagli</a>
              
                <a class="d-flex btn btn-link-red" href="/reports/{{ $report->id }}/chat">Chat</a>
                {{-- Lo useremo per sweetalert --}}
                <reportDelete></reportDelete>
                {{-- Il form ha come action quella di cancellare il report in question --}}
                <form action="{{action('ReportsController@destroy', $report->id)}}" method="post">
                    {{-- CSRF è token generato in automatico da Laravel per ogni sessione utente attiva gestita dall'applicazione. Il token viene utilizzato per verificare che l'utente autenticato sia quello che sta effettivamente effettuando le richieste all'applicazione.
                    Nei form va sempre messo in modo che sia possibile validare la richiesta --}}
                    @csrf
                    {{-- Viene dato all'input valore delete --}}
                    {{-- Vedi controller  --}}
                    <input name="_method" type="hidden" value="DELETE"></input>
                    <button class="d-flex btn btn-link-red" type="submit" name="close">Chiudi</button>
                </form>

              </div>
            </div>
          </li>
      @endforeach
    </ul>
  @else
    <div class="jumbotron">
      <h4 class="text-center text-muted">Nessuna segnalazione! stanno tutti bene <i class="fa fa-laugh-beam"></i> </h4>
    </div>
  @endif

@endsection
