@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header title-vigiles font-weight-bold">Nuova segnalazione</div>
  <div class="card-body">
    {!! Form::open(['url' => 'reports']) !!}
      @csrf
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
          {{Form::label('street_number', 'Civico *')}}
          {{Form::text('street_number', '', ['class' => 'form-control', 'placeholder' => 'N'])}}
        </div>
        <div class="form-group col-md-12 col-sm-12">
          {{Form::label('description', 'Descrizione')}}
          {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Inserisci la descrizione'])}}
        </div>
        <div class="form-group text-center col-md-12 col-sm-12">
          {{Form::label('media', 'Aggiungi foto o video')}} <br>
          {{Form::button('<i class="fa fa-plus"></i>', ['class' => 'btn btn-vigiles-circle'])}}
        </div>
        <div class="form-group text-center col-md-12 col-sm-12">
          {{Form::submit('Invia', ['class' => 'btn btn-vigiles'])}}
        </div>
      </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection
