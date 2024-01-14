<!-- resources/views/create.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un jeu</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container">
    <h1>Ajouter un jeu</h1>

    <!-- Formulaire d'ajout de jeu -->
    <form action="{{ route('game.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <div>
            <label for="price">Prix :</label>
            <input type="number" step="0.01" id="price" name="price" required>
        </div>

        <div>
            <label for="image">Image :</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <div>
            <button type="submit">Ajouter le jeu</button>
        </div>
    </form>

    <a href="{{ route('game.index') }}">Retour à la liste des jeux</a>
</div>
</body>
</html>
