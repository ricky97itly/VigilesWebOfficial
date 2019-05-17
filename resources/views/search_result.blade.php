@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header"><input type="text" name="search-bar"></div>
  <div class="card-body">
    @foreach ($reports as $report)
      {{ $report->title }}
    @endforeach
  </div>
</div>
@endsection
