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

        <div class="form-group row mb-0">
          <div class="col-md-3 col-sm-4 align-self-center separator-right">
            <img class="profile-pic border-vigiles" src="/storage/avatars/{{$user->avatar}}" alt="Your profile image">
          </div>
          <div class="col-md-9 col-sm-8 align-self-center">
            <button class="btn btn-link-red" type="button" onclick="selectAvatar()">Seleziona immagine</button>
            <input id="avatar" type="file" class="d-none form-control-file btn btn-link-red {{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" aria-describedby="avatar-desc">
            <small id="avatar-desc" class="text-muted">Seleziona un'immagine del profilo dalla tua galleria</small>
            <button type="submit" class="d-flex btn btn-vigiles mt-3">Conferma</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script type="text/javascript">
    function selectAvatar() {
      $("#avatar").click();
    }
  </script>
@endsection
