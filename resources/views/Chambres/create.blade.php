<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer Chambre</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-4xl bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Créer une nouvelle chambre</h2>

    <form method="POST" action="{{ route('chambres.store') }}" class="space-y-6">
        @csrf

        {{-- hotel_id --}}
        <div>
            <label class="block text-sm font-medium text-gray-600">Hotel ID</label>
            <input type="number" name="hotel_id"
                   class="w-full border rounded px-4 py-2 mt-1 bg-gray-50"
                   required>
        </div>

        {{-- number --}}
        <div>
            <label class="block text-sm font-medium text-gray-600">Numéro de chambre</label>
            <input type="text" name="number"
                   class="w-full border rounded px-4 py-2 mt-1 bg-gray-50"
                   required>
        </div>

        {{-- price --}}
        <div>
            <label class="block text-sm font-medium text-gray-600">Prix par nuit</label>
            <input type="number" step="0.01" name="price_per_night"
                   class="w-full border rounded px-4 py-2 mt-1 bg-gray-50"
                   required>
                            <div class="md:col-span-3">
                                <label for="category">Categorie</label>
                                <select id="category"  name ="cat" class="p-3 rounded-lg border border-gray-200 bg-white">
                                    <option value="0">Toutes les catégories</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{$categorie->nom}}</option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="md:col-span-5 text-right">
                                <div class="inline-flex items-end">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>

        {{-- capacity --}}
        <div>
            <label class="block text-sm font-medium text-gray-600">Capacité</label>
            <input type="number" name="capacity"
                   class="w-full border rounded px-4 py-2 mt-1 bg-gray-50"
                   required>
        </div>

        {{-- description --}}
        <div>
            <label class="block text-sm font-medium text-gray-600">Description</label>
            <textarea name="description"
                      class="w-full border rounded px-4 py-2 mt-1 bg-gray-50"
                      rows="3"></textarea>
        </div>

        {{-- Tags --}}
        <div>
            <p class="font-medium text-gray-700 mb-2">Tags</p>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                @foreach($tags as $tag)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                               class="rounded border-gray-300">
                        {{ $tag->name }}
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Properties --}}
        <div>
            <p class="font-medium text-gray-700 mb-2">Propriétés</p>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                @foreach($properties as $propertie)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" nom="properties[]" value="{{ $propertie->id }}"
                               class="rounded border-gray-300">
                        {{ $propertie->nom }}
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Submit --}}
        <div class="text-right">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold">
                Créer la chambre
            </button>
        </div>

    </form>
</div>

</body>
</html>
