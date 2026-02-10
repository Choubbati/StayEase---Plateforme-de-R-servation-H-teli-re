<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow border-0">
                <div class="card-body p-4">

                    <h2 class="fw-bold mb-3">
                         Chambre {{ $chambre->number }}
                    </h2>

                    <div class="d-flex gap-4 mb-4">
                        <div>
                            <span class="text-muted d-block">Prix</span>
                            <strong>{{ $chambre->price_per_night }} € / nuit</strong>
                        </div>

                        <div>
                            <span class="text-muted d-block">Capacité</span>
                            <strong>{{ $chambre->capacity }} personnes</strong>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-4">
                        <h5 class="fw-semibold mb-2"> Tags</h5>

                        @forelse ($chambre->tags as $tag)
                            <span class="badge bg-secondary me-1 mb-1">
                                {{ $tag->name }}
                            </span>
                        @empty
                            <span class="text-muted">Aucun tag</span>
                        @endforelse
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-semibold mb-2">Propriétés</h5>

                        <div class="d-flex flex-wrap gap-3">
                            @forelse ($chambre->properties as $property)
                                <div class="d-flex align-items-center gap-2">
                                    <span>{{ $property->nom }}</span>
                                </div>
                            @empty
                                <span class="text-muted">Aucune propriété</span>
                            @endforelse
                        </div>
                    </div>

                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                         Retour
                    </a>

                </div>
            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
