<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Radio Talk</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>番組詳細</h1>
        <div class="card" style="width: 18rem;">
            <h2>{{ $station_name }}</h2>
            <ul class="list-group list-group-flush">
                <h3>{{ $program_data->title }}</h3>
                <p>{{ $program_data->info }}</p>
            </ul>
        </div>
    </body>
</html>