@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header title-vigiles font-weight-bold">{{ $report->title }}</div>
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
              <label class="btn btn-outline-success font-weight-bold">
                <input type="radio" name="code_id" value="2" id="green" autocomplete="off"> Verde
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
            <img src="{{ $report->media }}" alt="Report picture">
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
</div>
@endsection
