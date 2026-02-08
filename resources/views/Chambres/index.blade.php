<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-5">

    <h2 class="mb-4 text-center fw-bold">Liste des Chambres</h2>
    <div class="mb-10 flex flex-col md:flex-row gap-4">
        <form action="{{ route('hotels.hotels')}}" method="post">
            @csrf
            <select name ="cat" class="p-3 rounded-lg border border-gray-200 bg-white">
                <option value="0">Toutes les catégories</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{$categorie->nom}}</option>
                @endforeach
            </select>
            <button type="submit"  class="flex items-center mt-3 py-2 px-3 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center">Filtrer</button>
        </form>
    </div>
    <div class="row g-4">
        @foreach ($chambres as $chambre)
            <div class="col-md-6 col-lg-4">

                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">

                        <h5 class="card-title fw-bold">
                            Chambre {{ $chambre->number }}
                        </h5>

                        <p class="mb-1">
                            <strong>Prix :</strong> {{ $chambre->price_per_night }} € / nuit
                        </p>

                        <p class="mb-3">
                             <strong>Capacité :</strong> {{ $chambre->capacity }} personnes
                        </p>

                        <div class="mb-3">
                            <span class="fw-semibold d-block mb-1">Tags :</span>

                            @forelse ($chambre->tags as $tag)
                                <span class="badge bg-secondary me-1 mb-1">
                                    {{ $tag->name }}
                                </span>
                            @empty
                                <span class="text-muted small">Aucun tag</span>
                            @endforelse
                        </div>

                        <a href="{{ route('chambres.show', $chambre->id) }}" class="btn btn-primary w-100">
                            Voir détails
                        </a>

                    </div>
                </div>

            </div>
        @endforeach
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
