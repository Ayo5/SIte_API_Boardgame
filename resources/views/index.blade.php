<!-- resources/views/index.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Board Game using API </title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container">
    @if(isset($data) && is_array($data))
        @foreach($data as $d)
            <div class="game-card">
                <p class="game-title">{{ $d['name'] }}</p>
                <img src="{{ asset($d['image']) }}" alt="{{ $d['name'] }}" class="game-image">
                <a href="{{ route('game.show', ['id' => $d['id']]) }}">Voir les détails</a>
            </div>
        @endforeach
    @else
        <p>No data available.</p>
    @endif
</div>
</body>
</html>
