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
            <label class="block text-sm font-medium text-gray-600">Hotel</label>
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
        </div>

        {{-- category --}}
        <div>
            <label class="block text-sm font-medium text-gray-600">Catégorie</label>
            <select name="category_id"
                    class="w-full border rounded px-4 py-2 mt-1 bg-gray-50">
                <option value="">Choisir une catégorie</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
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

        {{-- tags --}}
        <div>
            <p class="font-medium text-gray-700 mb-2">Tags</p>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                @foreach($tags as $tag)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                        {{ $tag->name }}
                    </label>
                @endforeach
            </div>
        </div>

        {{-- properties --}}
        <div>
            <p class="font-medium text-gray-700 mb-2">Propriétés</p>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                @foreach($properties as $property)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="properties[]" value="{{ $property->id }}">
                        {{ $property->nom }}
                    </label>
                @endforeach
            </div>
        </div>
         <label class="block text-sm font-medium text-gray-600">nom du fichier dans /assets/images/</label>
            <input type="text" name="image"
                   class="w-full border rounded px-4 py-2 mt-1 bg-gray-50">
        <div>
           
        {{-- submit --}}
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
