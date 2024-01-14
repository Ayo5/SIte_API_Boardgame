<x-layout>
    <body>
    <h1>Ajouter un nouveau jeu</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('game.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="name">Nom du jeu:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="price">Prix:</label>
        <input type="number" id="price" name="price" value="{{ old('price') }}" required>
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Ajouter le jeu</button>
    </form>
    </body>
</x-layout>
