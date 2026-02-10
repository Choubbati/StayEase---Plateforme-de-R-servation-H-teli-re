<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Properties</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

<div class="w-full max-w-3xl">

    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">

        <!-- Header -->
        <div class="bg-indigo-600 p-6">
            <h2 class="text-2xl font-bold text-white">Liste des Properties</h2>
            <p class="text-indigo-100 text-sm">Ajouter, modifier ou supprimer des propriétés</p>
        </div>

        <!-- Add Property -->
        <div class="p-6 border-b bg-slate-50">
            <form action="{{ route('properties.store') }}" method="POST" class="flex gap-3">
                @csrf

                <input type="text" name="nom" placeholder="Nom de la propriété"
                       class="flex-grow border rounded-xl px-4 py-2 text-sm"
                       value="{{ old('nom') }}">

                <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700">
                    Ajouter
                </button>
            </form>

            @error('nom')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- List -->
        <div>
            @if($properties->count())
                <ul class="divide-y">
                    @foreach ($properties as $propertie)
                        <li class="p-5 flex items-center justify-between gap-4 hover:bg-slate-50">

                            <!-- Update -->
                            <form action="{{ route('properties.update', $propertie->id) }}"
                                  method="POST"
                                  class="flex items-center gap-4 flex-grow">
                                @csrf
                                @method('PUT')

                                <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 7h18M3 12h18M3 17h18"/>
                                    </svg>
                                </div>

                                <input type="text" name="nom"
                                       value="{{ $propertie->nom }}"
                                       class="border rounded-lg px-3 py-2 text-sm w-full">

                                <button type="submit"
                                        class="px-4 py-2 text-sm text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100">
                                    Modifier
                                </button>
                            </form>

                            <!-- Delete -->
                            <form action="{{ route('properties.destroy', $propertie->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Supprimer cette propriété ?')"
                                        class="px-4 py-2 text-sm text-red-600 bg-red-50 rounded-lg hover:bg-red-100">
                                    Supprimer
                                </button>
                            </form>

                        </li>
                    @endforeach
                </ul>
            @else
                <div class="p-10 text-center text-slate-500">
                    Aucune propriété trouvée
                </div>
            @endif
        </div>

    </div>
</div>

</body>
</html>
