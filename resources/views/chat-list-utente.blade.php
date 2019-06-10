@extends('layouts.app')

@section('content')
  @if (! empty($reports))
    <div class="container">
      @foreach ($reports as $report)
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <a href="{{ route('chat-report', $report->id) }}">
                  {{ $report->title }}
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card bg-danger text-white">
            <div class="card-body">
              <p class="display-1">
                Nessuna chat disponibile!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
@endsection
