<x-Layout>
    <body>
    <div class="container">
        <h1>Modifier un jeu</h1>

        <form action="{{ route('update',['id'=> $firstDetail['id']]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Ajoutez un champ caché pour l'ID du jeu -->
            <input type="hidden" name="id" value="{{ $firstDetail['id'] }}">

            <div>
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" value="{{ $firstDetail['name'] }}" required>
            </div>

            <div>
                <label for="description">Description :</label>
                <textarea id="description" name="description" required>{{ $firstDetail['description'] }}</textarea>
            </div>

            <div>
                <label for="price">Prix :</label>
                <input type="number" step="0.01" id="price" name="price" value="{{ $firstDetail['price'] }}" required>
            </div>

            <div>
                <label for="image">Image :</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <div>
                <button class="btn-game" type="submit">Modifier le jeu</button>
            </div>
        </form>

        <a href="{{ route('index') }}" class="btn-game">Retour à la liste des jeux</a>
    </div>
    </body>
</x-Layout>
