@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      {{-- Modifica profilo --}}
      <div class="card">
        <div class="card-header title-vigiles font-weight-bold">
          {{ __('Profilo')}}
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-6 offset-md-4">
              <h4 class="text-vigiles text-left mb-4 font-weight-bold">{{ __('Aggiorna profilo') }}</h4>
            </div>
          </div>

          <form method="POST" action="{{ action('StorageController@update', $user->id) }}">
            @csrf
            @method('PUT')

            {{-- Nome --}}
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required autofocus>
                @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            {{-- Cognome --}}
            <div class="form-group row">
              <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

              <div class="col-md-6">
                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ Auth::user()->surname }}" required autofocus>

                @if ($errors->has('surname'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('surname') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Email --}}
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Indirizzo --}}
            <div class="form-group row">
              <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

              <div class="col-md-4">
                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ Auth::user()->address }}" required>

                @if ($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
              </div>

              {{-- Civico --}}
              <div class="col-md-2">
                <input id="street_number" type="number" class="form-control{{ $errors->has('street_number') ? ' is-invalid' : '' }}" name="street_number" value="{{ Auth::user()->street_number }}" required>

                @if ($errors->has('street_number'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('street_number') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Modifica password --}}
            <div class="row">
              <div class="col-md-6 offset-md-4">
                <h4 class="text-vigiles text-left mb-4 font-weight-bold">{{__('Modifica password')}}</h4>
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Vecchia password') }}</label>

              <div class="col-md-6">
                <input id="old-password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="old_password" value="">

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nuova password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="">

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma nuova password') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="">
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-vigiles font-weight-bold mt-3">
                  {{ __('Aggiorna') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
