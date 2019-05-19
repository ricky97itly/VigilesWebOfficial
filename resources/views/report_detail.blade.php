@extends('layouts.app')

@section('content')
  @if(Auth::check() && Auth::user()->is_admin == 1)
    <div class="card">
      <div class="card-header title-vigiles font-weight-bold"><a class="link-red mb-4" href="/home"><i class="fas fa-chevron-circle-left"></i> Torna alla home</a></div>
      <div class="card-body">
        <form action="{{ action('ReportsController@update', $report->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="form-group col-md-6 col-sm-6">
              <div class="row">
                <div class="form-group col-md-12 col-sm-12">
                  {{Form::label('title', 'Titolo')}}
                  {{Form::text('title', "$report->title", ['class' => 'form-control'])}}
                </div>
                <div class="form-group col-md-12 col-sm-12">
                  {{Form::label('codes', 'Codice di gravità')}}
                  <div class="d-flex btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-success font-weight-bold active">
                      <input type="radio" name="code_id" value="2" id="green" autocomplete="off" checked> Verde
                    </label>
                    <label class="btn btn-outline-warning font-weight-bold">
                      <input type="radio" name="code_id" value="3" id="yellow" autocomplete="off"> Giallo
                    </label>
                    <label class="btn btn-outline-danger font-weight-bold">
                      <input type="radio" name="code_id" value="4" id="red" autocomplete="off"> Rosso
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-10 col-sm-10 d-inline-block">
                  {{Form::label('address', 'Indirizzo')}}
                  {{Form::text('address', "$report->address", ['class' => 'form-control'])}}
                </div>
                <div class="form-group col-md-2 col-sm-2 d-inline-block">
                  {{Form::label('street_number', 'Civico')}}
                  {{Form::text('street_number', "$report->street_number", ['class' => 'form-control'])}}
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12 col-sm-12">
                  {{Form::label('tags', 'Tags')}}
                  {{Form::text('tags', "$report->tags", ['class' => 'form-control'])}}
                </div>
                <div class="form-group col-md-12 col-sm-12">
                  {{Form::label('description', 'Descrizione')}}
                  {{Form::textarea('description', "$report->description", ['class' => 'form-control'])}}
                </div>
              </div>
            </div>
            <div class="form-group col-md-6 col-sm-6 text-center">
              <img class="img-fluid img-thumbnail" src="{{ $report->media }}" alt="Report picture">
            </div>
          </div>
          <div class="row">
            <div class="form-group text-center col-md-12 col-sm-12 mt-4">
              <input type="hidden" name="media" value="{{ $report->media }}">
              <input type="hidden" name="user_id" value="{{ $report->user_id }}">
              {{Form::submit('Invia', ['class' => 'btn btn-vigiles'])}}
            </div>
          </div>
        </form>
      </div>
    </div>
  @elseif(Auth::check())
    <div class="card">
      <div class="card-header title-vigiles font-weight-bold"><a class="link-red mb-4" href="/home"><i class="fas fa-chevron-circle-left"></i> Torna alla home</a></div>
      <div class="card-body">
        <form action="">
          @csrf
          <div class="row">
            <div class="form-group align-self-stretch col-md-6 col-sm-6">
              <div class="form-group col-md-12 col-sm-12">
                <h2>{{Form::label('title', "$report->title")}}
                  @if($report->code_id == 2)
                    <i title="Codice verde" class="fas fa-frown text-success ml-2"></i>
                  @elseif($report->code_id == 3)
                    <i title="Codice giallo" class="fas fa-exclamation-triangle text-warning ml-2"></i>
                  @elseif($report->code_id == 4)
                    <i title="Codice rosso" class="fas fa-meteor text-danger ml-2"></i>
                  @endif
                </h2>
                <h6 class="text-muted">{{Form::label('address', "$report->address, $report->street_number")}}</h6>
              </div>
              <div class="form-group col-md-12 col-sm-12 mt-3">
                <h5 class="mt-2">{{Form::label('description', "$report->description")}}</h5>
              </div>
              <div class="form-group col-md-12 col-sm-12">
                <h6 class="mt-4">
                  {{Form::label('tags', "Tags:")}}
                  <em>{{Form::label('tags', "$report->tags")}}</em>
                </h6>
              </div>
              <div class="form-group col-md-12 col-sm-12 user-for-report">
                <h6 class="mt-auto">
                  {{Form::label('user', "Segnalato da: ")}}
                  <em>{{Form::label('tags', "$report->user_name $report->user_surname")}}</em>
                </h6>
              </div>
            </div>
            <div class="form-group col-md-6 col-sm-6 text-center">
              <img class="img-fluid img-thumbnail" src="{{ $report->media }}" title="Immagine segnalazione" alt="Report picture">
            </div>
          </div>
          <input type="hidden" name="media" value="{{ $report->media }}">
          <input type="hidden" name="user_id" value="{{ $report->user_id }}">
        </form>
      </div>
    </div>
  @endif
@endsection
