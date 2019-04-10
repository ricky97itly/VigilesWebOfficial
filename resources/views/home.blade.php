@extends('layouts.app')

@section('head_content')
  {!! $map['js'] !!}
@endsection

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@section('content')
  {!! $map['html'] !!}
@endsection