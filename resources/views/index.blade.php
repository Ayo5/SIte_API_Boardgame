<!-- resources/views/index.blade.php -->
<x-layout>
<body>

<h2> Filtrage par catégorie</h2>
<form class="form" action="{{ route('index') }}" method="get">
    <select name="cat" onchange='this.form.submit()'>
        <option value="All" {{ $cat == 'All' ? 'selected' : '' }}>-- Toutes catégories --</option>
        @foreach($data as $category)
            <option value="{{ $category['category'] }}" {{ $cat == $category['category'] ? 'selected' : '' }}>{{ $category['category'] }}</option>
        @endforeach
    </select>
</form>

</form>
<h1> Liste des jeux </h1>
<div class="container">
    @foreach($data as $d)
        <div class="game-card">
            <p class="game-title">{{ $d['name'] }}</p>
            <img src="{{ asset($d['image']) }}" alt="Description de l'image" class="game-image">
            <p class="game-description">{{ $d['description'] }}</p>
            <p class="game-price">{{ $d['price'] }} €</p>

        </div>
    @endforeach
</div>
</body>
</x-layout>
