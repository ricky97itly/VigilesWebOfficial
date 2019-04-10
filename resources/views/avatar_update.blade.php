@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header ">
      <div class="title-vigiles font-weight-bold">
        {{__('Modifica immagine del profilo')}}
      </div>
    </div>
    <div class="card-body">
      <form action="/avatar" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('POST') --}}

        <div class="form-group row mb-0">
          <div class="col-md-6 col-sm-6 align-middle separator-right">
            <img class="border-vigiles rounded-circle" src="/storage/avatars/{{$user->avatar}}" alt="Your profile image">
          </div>
          <div class="col-md-6 col-sm-6 align-middle">
            <input id="avatar" type="file" class="form-control-file btn btn-link-red {{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" aria-describedby="avatar-desc">
            <small id="avatar-desc" class="text-muted">Seleziona un'immagine del profilo dalla tua galleria</small>
            <button type="submit" class="form-control btn btn-vigiles mt-4">Conferma</button>
          </div>
        </div>
        <div class="form-group row">

        </div>
      </form>
    </div>
  </div>
@endsection
