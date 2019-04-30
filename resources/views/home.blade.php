@extends('layouts.app')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@section('content')
  <div id="map">
  	{!! Mapper::render() !!}
  </div>
@endsection
