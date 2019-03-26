@extends('layouts.app')

@section('content')
<h1 class="mb-4">Nuova segnalazione</h1>
  {!! Form::open(['url' => 'reports/submit']) !!}
    <div class="row">
      <div class="form-group col-md-12 col-sm-12">
        {{Form::label('campioggbligatori', '* I campi contrassegnati sono obbligatori')}}
      </div>
      <div class="form-group col-md-12 col-sm-12">
        {{Form::label('title', 'Titolo *')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Inserisci il titolo'])}}
      </div>
      <div class="form-group col-md-11 col-sm-10">
        {{Form::label('address', 'Indirizzo *')}}
        {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Inserisci il tuo indirizzo'])}}
      </div>
      <div class="form-group col-md-1 col-sm-2">
        {{Form::label('streetNumber', 'Civico *')}}
        {{Form::text('streetNumber', '', ['class' => 'form-control', 'placeholder' => 'N'])}}
      </div>
      <div class="form-group col-md-12 col-sm-12">
        {{Form::label('description', 'Descrizione')}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Inserisci la descrizione'])}}
      </div>
      <div class="form-group text-center col-md-12 col-sm-12">
        {{Form::label('media', 'Aggiungi foto o video')}} <br>
        {{Form::button('+', ['class' => 'btn btn-vigiles-rounded text-light'])}}
      </div>
      <div class="form-group text-center col-md-12 col-sm-12">
        {{Form::submit('Submit', ['class' => 'btn btn-vigiles text-light'])}}
      </div>
    </div>
  {!! Form::close() !!}
@endsection
