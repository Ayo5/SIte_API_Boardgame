<x-layout>
<body>
<div class="container">
    <div class="game-card">
    <h1 class="game-title">{{ $firstDetail['name'] }}</h1>
    <img src="{{ asset($firstDetail['image']) }}" alt="Description de l'image" class="game-image">
    <p>Description : {{ $firstDetail['description'] }}</p>
    <p>Prix : {{ $firstDetail['price'] }} €</p>
    <p>Catégorie : {{ $firstDetail['category'] }}</p>
    <p>Nombre de joueurs : {{ $firstDetail['number_gamer'] }}</p>
    <p>Temps de jeu : {{ $firstDetail['playing_time'] }} minutes</p>
    <p>Complexité : {{ $firstDetail['complexity'] }}</p>
    <p>Évaluation : {{ $firstDetail['rating'] }}</p>
    <p>Nombre d'évaluations : {{ $firstDetail['number_rating'] }}</p>
    <p>Date de publication : {{ $firstDetail['published_date'] }}</p>
    </div>
</div>
</body>

</x-layout>
