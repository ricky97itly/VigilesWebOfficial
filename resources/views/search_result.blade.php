@extends('layouts.app')

@section('content')
  @isset ($reports)
    @if (count($reports) >= 1)
      <div class="card">
        <div class="card-header title-vigiles font-weight-bold">Risultati della ricerca</div>
        <li class="list-group-item list-header">
          <div class="row text-vigiles font-weight-bold">
            <div class="col-md-3 align-self-center">
              Titolo
            </div>
            <div class="col-md-3 align-self-center">
              Indirizzo
            </div>
            <div class="col-md-3 align-self-center">
              Tags
            </div>
            <div class="col-md-3 align-self-center">
              {{-- Empty --}}
            </div>
          </div>
        </li>
        @foreach ($reports as $report)
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-3 align-self-center font-weight-bold">
                {{ $report->title }}
              </div>
              <div class="col-md-3 align-self-center">
                {{ $report->address }}, {{ $report->street_number }}
              </div>
              <div class="col-md-3 align-self-center">
                {{ $report->tags }}
              </div>
              <div class="col-md-3 pull-right text-right">
                <a class="btn btn-vigiles-sm" href="/home/{{ $report->id }}" data-placement="top" title="Vedi sulla mappa"><i class="fas fa-map-marker-alt"></i></a>
                <a class="btn btn-vigiles-sm-w" href="/reports/{{ $report->id }}/edit">Dettagli</a>
              </div>
            </div>
          </li>
        @endforeach
      </div>
    @else
      <div class="jumbotron">
        <h1 class="text-center display-2 text-muted"> <i class="fas fa-ban"></i></h1>
        <h4 class="text-center text-muted">Nessun risultato corrispondente ai criteri di ricerca</h4>
      </div>
    @endif
  @endisset
  @if ($reports == null)
    <div class="jumbotron">
      <h1 class="text-center display-2 text-muted"><i class="fas fa-sad-tear"></i></h1>
      <h4 class="text-center text-muted">Inserisci una parola chiave o un indirizzo per cercare segnalazioni </h4>
    </div>
  @endif
@endsection
