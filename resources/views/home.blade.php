@extends('layouts.app')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@section('content')
  @include('cornford.googlmapper.map')
  {!! Mapper::render() !!}
@endsection
