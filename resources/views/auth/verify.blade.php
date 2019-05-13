@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Verifica il tuo indirizzo Email') }}</div>

          <div class="card-body">
            @if (session('resent'))
              <div class="alert alert-success" role="alert">
                {{ __('Una mail di verifica è stata spedita al tuo account.') }}
              </div>
            @endif

            {{ __('Prima di proseguire, vi preghiamo di cliccare sul link di verifica che vi abbiamo inviato.') }}
            {{ __('Se non hai ricevuto la mail') }}, <a href="{{ route('verification.resend') }}">{{ __('premi qui per mandarne un\'altra') }}</a>.
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
