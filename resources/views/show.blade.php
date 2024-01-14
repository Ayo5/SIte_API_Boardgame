<!-- resources/views/game/show.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du jeu</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container">
    <h1>{{ $gameDetails['name'] }}</h1>
    <p>Description : {{ $gameDetails['description'] }}</p>
    <p>Prix : {{ $gameDetails['price'] }}</p>
    <p>Catégorie : {{ $gameDetails['category'] }}</p>
    <p>Nombre de joueurs : {{ $gameDetails['number_gamer'] }}</p>
    <p>Temps de jeu : {{ $gameDetails['playing_time'] }} minutes</p>
    <p>Complexité : {{ $gameDetails['complexity'] }}</p>
    <p>Évaluation : {{ $gameDetails['rating'] }}</p>
    <p>Nombre d'évaluations : {{ $gameDetails['number_rating'] }}</p>
    <p>Date de publication : {{ $gameDetails['published_date'] }}</p>
</div>
</body>
</html>
