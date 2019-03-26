<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <title>Vigiles Web</title>

    {!! $map['js'] !!}
  </head>
  <body>
    @include('inc.navbar')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {!! $map['html'] !!}

    @include('inc.footer')
  </body>
</html>
