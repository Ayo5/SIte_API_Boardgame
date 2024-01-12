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
    <form action="/store" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Nom du jeu</label>
        <input type="text" id="name" name="name" required>

        <label for="image">Image du jeu</label>
        <input type="file" id="image" name="image" required>

        <button type="submit">Ajouter le jeu</button>
    </form>
</div>
</body>
</html>
