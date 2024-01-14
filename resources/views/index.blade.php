<x-layout>
    <body>

    <button class="btn-game"><a href="{{ route('game.create') }}">Ajouter</a></button>
    <h2>Filtrage par catégorie</h2>
    <form class="form" action="{{ route('index') }}" method="get">
        <select name="cat" onchange='this.form.submit()'>
            <option value="All" {{ $cat == 'All' ? 'selected' : '' }}>-- Toutes catégories --</option>
            @foreach($data as $category)
                <option value="{{ $category['category'] }}" {{ $cat == $category['category'] ? 'selected' : '' }}>
                    {{ $category['category'] }}
                </option>
            @endforeach
        </select>
    </form>

    <h1>Liste des jeux</h1>
    <div class="container">
        @forelse($data as $d)
            <div href="" class="game-card">
                <p class="game-title">{{ $d['name'] }}</p>
                <img src="{{ asset($d['image']) }}" alt="Description de l'image" class="game-image">
                <p class="game-description">{{ $d['description'] }}</p>
                <p class="game-price">{{ $d['price'] }} €</p>
                <button class="btn-game">
                    <a href="{{ route('game.show', ['id' => $d['id']]) }}">Détails</a>
                </button>
                <button class="btn-game">
                    <a href="{{ route('edit', ['id' => $d['id']]) }}">Editer</a>
                </button>

                <form action="{{ route('delete', ['id' => $d['id']]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn-game">Supprimer</button>
                </form>
            </div>
        @empty
            <p>No games available.</p>
        @endforelse
    </div>
    </body>
</x-layout>
