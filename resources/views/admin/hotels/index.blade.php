<form method="GET" action="{{ route('hotels.search') }}" class="row g-2 mb-3">
    <div class="col-md-5">
        <input type="text" name="nom" class="form-control" placeholder="Nom de l'hôtel" value="{{ request('nom') }}">
    </div>
    <div class="col-md-5">
        <input type="text" name="ville" class="form-control" placeholder="Ville" value="{{ request('ville') }}">
    </div>
    <div class="col-md-2 d-grid">
        <button class="btn btn-primary">Rechercher</button>
    </div>
</form>
