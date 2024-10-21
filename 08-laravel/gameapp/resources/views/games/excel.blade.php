<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Games</title>
</head>
<body>
    <table>
        <tr>

        </tr>
        @foreach ($games as $game)
            <tr>
                <td>{{ $game->id }}</td>
                <td>{{ $game->title }}</td>
                <td>{{ $game->developer }}</td>
                <td>{{ $game->releasedate }}</td>
                <td>{{ $game->price }}</td>
                <td>{{ $game->genre }}</td>
                <td>{{ $game->description }}</td>
                <td><img src="{{ public_path().'/images/'.$game->image }}"></td>
            </tr>
        @endforeach
    </table>
</body>
</html>