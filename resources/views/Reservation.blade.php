{{-- Formulaire pour sélectionner les dates --}}<form method="GET" action="{{ route('reserve') }}">
    @csrf
    <label for="date_debut">Date d'arrivée :</label>
    <input type="date" name="date_debut" value="{{ old('date_debut', $dateDebut ?? '') }}" required>

    <label for="date_fin">Date de départ :</label>
    <input type="date" name="date_fin" value="{{ old('date_fin', $dateFin ?? '') }}" required>

    <button type="submit">Rechercher</button>
</form>

{{-- Affichage des chambres disponibles --}}
@if($chambres->count() > 0)
<ul>
    @foreach($chambres as $chambre)
    <li>
        {{-- Chambre {{ $chambre->numero }} - Hôtel : {{ $chambre->hotels->nom }} - Prix : {{ $chambre->prix }}€/nuit
        }}        {{-- Lien vers les détails (US 3.2) --}}
        <a href="{{ route('chambres.show', $chambre->id) }}">Voir détails</a>
    </li>
    @endforeach
</ul>
{{-- Pagination --}}
{{ $chambres->links() }}
@else
<p>Aucune chambre disponible pour ces dates.</p>
@endif
