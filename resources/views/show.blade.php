<x-layout>
<body>
<div class="container">
    <div class="game-card">
    <h1 class="game-title">{{ $gameData['name'] }}</h1>
    <img src="{{ asset($gameData['image']) }}" alt="Description de l'image" class="game-image">
    <p>Description : {{ $gameData['description'] }}</p>
    <p>Prix : {{ $gameData['price'] }} €</p>
    <p>Catégorie : {{ $gameData['category'] }}</p>
    <p>Nombre de joueurs : {{ $gameData['number_gamer'] }}</p>
    <p>Temps de jeu : {{ $gameData['playing_time'] }} minutes</p>
    <p>Complexité : {{ $gameData['complexity'] }}</p>
    <p>Évaluation : {{ $gameData['rating'] }}</p>
    <p>Nombre d'évaluations : {{ $gameData['number_rating'] }}</p>
    <p>Date de publication : {{ $gameData['published_date'] }}</p>
        <button class="btn-game"><a href="{{ route('edit', ['id' => $gameData['id']])}}">Editer </a></button>
        <form action="{{ route('delete', ['id' => $gameData['id']]) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn-game">Supprimer</button>
        </form>
    </div>
</div>
</body>

</x-layout>
