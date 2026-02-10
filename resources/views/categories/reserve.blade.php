@foreach($categoriesDisponibles as $categorie)
    <div>
        <h3>{{ $categorie->nom }}</h3>
        <p>Stock total: {{ $categorie->stock }}</p>

        <form method="POST" action="{{ route('reservation.store') }}">
            @csrf
            <input type="hidden" name="categorie_id" value="{{ $categorie->id }}">
            <input type="hidden" name="date_debut" value="{{ request('date_debut') }}">
            <input type="hidden" name="date_fin" value="{{ request('date_fin') }}">

            <button>Réserver</button>
        </form>
    </div>
@endforeach

