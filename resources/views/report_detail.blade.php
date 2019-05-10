@extends('layouts.app')

@section('content')
  @if(Auth::check() && Auth::user()->is_admin == 1)
    <div class="card">
      <div class="card-header title-vigiles font-weight-bold"><a class="link-red mb-4" href="/"><i class="fas fa-chevron-circle-left"></i> Torna alla home</a></div>
      <div class="card-body">
        <form action="{{ action('ReportsController@update', $report->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="form-group col-md-6 col-sm-6">
              {{Form::label('title', 'Titolo')}}
              {{Form::text('title', "$report->title", ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-5 col-sm-5">
              {{Form::label('address', 'Indirizzo')}}
              {{Form::text('address', "$report->address", ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-1 col-sm-1">
              {{Form::label('street_number', 'Civico')}}
              {{Form::text('street_number', "$report->street_number", ['class' => 'form-control'])}}
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-sm-6">
              {{Form::label('tags', 'Tags')}}
              {{Form::text('tags', "$report->tags", ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-6 col-sm-6">
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
          <div class="row mt-4">
            <div class="form-group col-md-6 col-sm-6">
              {{Form::label('description', 'Descrizione')}}
              {{Form::textarea('description', "$report->description", ['class' => 'form-control'])}}
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
      <div class="card-header title-vigiles font-weight-bold"><a class="link-red mb-4" href="/"><i class="fas fa-chevron-circle-left"></i> Torna alla home</a></div>
      <div class="card-body">
        <form action="">
          @csrf
          <div class="row">
            <div class="form-group col-md-6 col-sm-6">
              {{Form::label('title', 'Titolo')}}
              <h4>{{Form::label('title', "$report->title")}}</h4>
            </div>
            <div class="form-group col-md-5 col-sm-5">
              {{Form::label('address', 'Indirizzo')}}
              <h4>{{Form::label('address', "$report->address")}}</h4>
            </div>
            <div class="form-group col-md-1 col-sm-1">
              {{Form::label('street_number', 'Civico')}}
              <h4>{{Form::label('street_number', "$report->street_number")}}</h4>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-sm-6">
              {{Form::label('tags', 'Tags')}}
              <h4>{{Form::label('tags', "$report->tags")}}</h4>
            </div>
            <div class="form-group col-md-6 col-sm-6">
              {{Form::label('codes', 'Codice di gravità')}}
              @if($report->code_id == 2)
                <h4>{{Form::label('codes', 'Codice verde', ['class' => 'text-success font-weigth-bold'])}}</h4>
              @elseif($report->code_id == 3)
                <h4>{{Form::label('codes', 'Codice giallo', ['class' => 'text-warning font-weigth-bold'])}}</h4>
              @elseif($report->code_id == 4)
                <h4>{{Form::label('codes', 'Codice rosso', ['class' => 'text-danger font-weigth-bold'])}}</h4>
              @endif
            </div>
          </div>
          <div class="row mt-4">
            <div class="form-group col-md-6 col-sm-6">
              {{Form::label('description', 'Descrizione')}}
              <h4>{{Form::label('description', "$report->description")}}</h4>
            </div>
            <div class="form-group col-md-6 col-sm-6 text-center">
              <img class="img-fluid img-thumbnail" src="{{ $report->media }}" alt="Report picture">
            </div>
          </div>
          <div class="row">
            <div class="form-group text-center col-md-12 col-sm-12 mt-4">
              <input type="hidden" name="media" value="{{ $report->media }}">
              <input type="hidden" name="user_id" value="{{ $report->user_id }}">
            </div>
          </div>
        </form>
      </div>
    </div>
  @endif
@endsection
