@extends('layout.app')

@section('content')
    <h2 class="title-vigiles font-weight-bold">Segnalazioni in stato di attesa</h2>
    <ul class="list-group">
        @foreach($reports as $report)
            <li class="list-group-item">{{ $report->title }}</li>
        @endforeach
    </ul>
@endsection
