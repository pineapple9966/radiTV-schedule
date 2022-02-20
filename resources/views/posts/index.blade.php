<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Radio Talk</title>
        <!-- Fonts -->
    </head>
    <body>
        <h1>ラジオ局</h1>
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                @foreach ($radios->stations->station as $index => $station)
                    <li class="list-group-item"><a href='/radios/{{ $station->name }}'>{{ $station->name }}</li></a>
                @endforeach
            </ul>
        </div>
    </body>
</html>