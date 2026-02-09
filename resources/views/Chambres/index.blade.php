<div class="container mx-auto py-10 px-4">

    <h2 class="text-3xl font-bold mb-8 text-center">Liste des Chambres</h2>
    
    <a href="{{ route('chambres.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded shadow mb-6 inline-block hover:bg-blue-700">
        Ajouter une chambre
    </a>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($chambres as $chambre)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">

                <div class="p-5">
                    <h5 class="text-xl font-semibold mb-2">Chambre {{ $chambre->number }}</h5>

                    <p class="mb-1">
                        <span class="font-semibold">Prix :</span> {{ $chambre->price_per_night }} € / nuit
                    </p>

                    <p class="mb-3">
                        <span class="font-semibold">Capacité :</span> {{ $chambre->capacity }} personnes
                    </p>

                    <div class="mb-4">
                        <span class="font-semibold block mb-1">Tags :</span>
                        @forelse ($chambre->tags as $tag)
                            <span class="inline-block bg-gray-300 text-gray-800 text-sm px-2 py-1 rounded mr-1 mb-1">
                                {{ $tag->name }}
                            </span>
                        @empty
                            <span class="text-gray-500 text-sm">Aucun tag</span>
                        @endforelse
                    </div>

                    <div class="space-y-2">
                        <form action="{{ route('chambres.destroy', $chambre->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?')">
                                Supprimer
                            </button>
                        </form>

                        <a href="{{ route('chambres.edit', $chambre->id) }}" 
                           class="w-full block bg-yellow-400 text-black py-2 rounded hover:bg-yellow-500 text-center">
                            Modifier
                        </a>

                        <a href="{{ route('chambres.show', $chambre->id) }}" 
                           class="w-full block bg-blue-600 text-white py-2 rounded hover:bg-blue-700 text-center">
                            Voir détails
                        </a>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

</div>
<script src="https://cdn.tailwindcss.com"></script>
