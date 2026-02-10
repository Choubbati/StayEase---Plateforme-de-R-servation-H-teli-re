<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Tags</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex items-center justify-center py-12 px-4">

    <div class="w-full max-w-3xl">
        
        <!-- Main Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
            
            <!-- Card Header -->
            <div class="bg-indigo-600 p-6 sm:p-8">
                <h2 class="text-2xl font-bold text-white tracking-tight">
                    Liste des Tags
                </h2>
                <p class="text-indigo-100 text-sm mt-1 opacity-90">
                    Ajoutez ou supprimez des étiquettes pour vos chambres.
                </p>
            </div>

            <!-- Add Tag Form Section -->
            <div class="p-6 sm:p-8 border-b border-slate-100 bg-slate-50/50">
                <form action="{{ route('tags.store') }}" method="POST" class="flex flex-col sm:flex-row gap-3">
                    @csrf
                    
                    <div class="flex-grow">
                        <label for="tag_name" class="sr-only">Nom du tag</label>
                        <input type="text" name="name" id="tag_name" placeholder="Ex: Vue Mer, Climatisé..." required
                            class="w-full bg-white border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3 transition-colors shadow-sm">
                    </div>

                    <button type="submit" 
                        class="whitespace-nowrap flex items-center justify-center px-6 py-3 border border-transparent text-sm font-semibold rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all shadow-md">
                        
                        <svg class="w-4 h-4 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>

                        Créer le Tag
                    </button>
                </form>
            </div>

            <!-- Tags List Section -->
   <div class="p-0">
    @if ($tags->count())
        <ul class="divide-y divide-slate-100">
            @foreach ($tags as $tag)
                <li class="p-5 flex items-center justify-between gap-4">

                    <!-- Left -->
                    <form action="{{ route('tags.update', $tag->id) }}" method="POST"
                          class="flex items-center gap-4">
                        @csrf
                        @method('PUT')

                        <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>

                        <input type="text" name="name"
                               value="{{ $tag->name }}"
                               class="border border-slate-200 rounded px-3 py-1 text-sm w-48">

                        <button type="submit"
                                class="px-3 py-2 text-sm text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg">
                            Modifier
                        </button>
                    </form>

                    <!-- Delete -->
                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Supprimer ce tag ?')"
                            class="px-3 py-2 text-sm text-red-600 bg-red-50 hover:bg-red-100 rounded-lg">
                            Supprimer
                        </button>
                    </form>

                </li>
            @endforeach
        </ul>
    @else
        <div class="p-12 text-center">
            <p class="text-slate-500">Aucun tag trouvé</p>
        </div>
    @endif
</div>


        </div>
    </div>

</body>
</html>