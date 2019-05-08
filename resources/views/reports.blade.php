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
      </div>
      <div class="row">
        <div class="form-group col-md-6 col-sm-6">
          {{Form::label('title', 'Titolo*')}}
          {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Inserisci il titolo'])}}
        </div>
        <div class="form-group col-md-5 col-sm-5">
          {{Form::label('address', 'Indirizzo*')}}
          {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Inserisci il tuo indirizzo'])}}
        </div>
        <div class="form-group col-md-1 col-sm-1">
          {{Form::label('street_number', 'Civico*')}}
          {{Form::text('street_number', '', ['class' => 'form-control', 'placeholder' => 'N'])}}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6 col-sm-6">
          {{Form::label('description', 'Descrizione')}}
          {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Inserisci la descrizione'])}}
        </div>
        <div class="form-group col-md-6 col-sm-6">
          <div class="row">
            <div class="form-group col-md-12 col-sm-12">
              {{Form::label('tags', 'Tags')}}
              {{Form::text('tags', '', ['class' => 'form-control', 'placeholder' => 'Inserisci tag per la ricerca'])}}
            </div>
            <div class="form-group col-md-12 col-sm-12 text-center mt-4">
              {{Form::label('media', 'Aggiungi foto o video')}} <br>
              {{Form::button('<i class="fa fa-plus"></i>', ['class' => 'btn btn-vigiles-circle'])}}
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group text-center col-md-12 col-sm-12 mt-4">
          {{Form::submit('Invia', ['class' => 'btn btn-vigiles'])}}
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection
