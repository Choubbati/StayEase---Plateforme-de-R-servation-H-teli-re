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
                @forelse ($tags as $tag)
                    <ul class="divide-y divide-slate-100">
                        <li class="flex items-center justify-between p-5 hover:bg-slate-50 transition-colors duration-200 group">
                            
                            <!-- Tag Name Display -->
                            <div class="flex items-center gap-4">
                                <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <span class="text-base font-semibold text-slate-700">
                                    {{ $tag->name }}
                                </span>
                            </div>

                            <!-- Delete Action -->
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="inline-flex">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce tag ?')"
                                    class="flex items-center px-3 py-2 text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded-lg border border-transparent hover:border-red-200 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1">
                                    
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    
                                    Supprimer
                                </button>
                            </form>
                        </li>
                    </ul>
                @empty
                    <!-- Empty State -->
                    <div class="p-12 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-slate-900">Aucun tag trouvé</h3>
                        <p class="text-slate-500 mt-1">Commencez par ajouter un nouveau tag ci-dessus.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

</body>
</html>