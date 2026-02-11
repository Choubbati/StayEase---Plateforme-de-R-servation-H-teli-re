<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Chambres</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
            <span class="text-2xl font-extrabold tracking-tight text-slate-900">
                Stay<span class="text-indigo-600">Ease</span>
            </span>
    </nav>
<body class="bg-slate-50 text-slate-900 min-h-screen">

    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8 max-w-7xl">

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Liste des Chambres
                </h2>
                <p class="text-slate-500 mt-1">Gérez les disponibilités et les tarifs.</p>
            </div>
            
            <a href="{{ route('chambres.create') }}"
               class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
               
                <svg class="w-5 h-5 mr-2 -ml-1 shrink-0"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4" />
                </svg>

                Ajouter une chambre
            </a>
        </div>

        <!-- Filter Section -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 mb-10">
                    <form action="{{ route('chambres.filter') }}" method="GET">
                @csrf

                <!-- Select Category -->
                 <div class ="d-flex inline-flex flex-wrap gap-9 mb-9">
                                   <div class="w-full lg:w-1/4">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Catégorie</label>
                    <select name="cat"
                        class="w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block p-2.5 transition-colors">
                        <option value="0">Toutes les catégories</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">
                                {{ $categorie->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Select Tag -->
                <div class="w-full lg:w-1/4">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Tags</label>
                    <select name='tag' class="w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block p-2.5 transition-colors">
                        <option value=''>Tous les tags</option>
                        @foreach ($allTags as $tag)
                        <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Select Property -->
                <div class="w-full lg:w-1/4">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Propriétés</label>
                    <select name='property' class="w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block p-2.5 transition-colors">
                        <option value=''>Toutes les propriétés</option>
                        @foreach ($allProperties as $prop)
                        <option value='{{ $prop->id }}'>{{ $prop->name }}</option>
                        @endforeach
                    </select>
                </div>
            
                <!-- Submit Button -->
                <div class="w-full lg:w-auto">
                    <button type="submit"
                        class="w-full lg:w-auto flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-6 py-3 rounded-xl shadow-sm transition-all duration-200">

                        <svg class="w-4 h-4 mr-2 shrink-0"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 4h18v2l-7 7v4l-4 4v-8L3 6z" />
                        </svg>

                        Filtrer
                    </button>
                </div>
            </form>
                 </div>
     
        </div>

        <!-- Rooms Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($chambres as $chambre)
                <div class="group bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden flex flex-col hover:shadow-2xl transition-shadow duration-300">

                    <!-- Image -->
                    <div class="h-56 bg-slate-200 relative overflow-hidden">
                        @if($chambre->image)
                            <img src="/assets/images/{{ $chambre->image }}" alt="Image de la chambre {{ $chambre->number }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-slate-100">
                                <svg class="w-12 h-12 text-slate-400 shrink-0"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 16l4-4 4 4 4-4 4 4M4 8h16" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-3">
                            <h5 class="text-xl font-bold text-slate-900 leading-snug">
                                Chambre {{ $chambre->number }}
                            </h5>
                        </div>

                        <!-- Price & Capacity Info -->
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <span class="block text-sm text-slate-500">Prix / nuit</span>
                                <p class="text-2xl font-extrabold text-indigo-600">
                                    {{ $chambre->price_per_night }} €
                                </p>
                            </div>
                            
                            <span class="flex items-center px-3 py-1 bg-slate-100 text-slate-600 text-xs font-bold rounded-full uppercase tracking-wide">
                                <svg class="w-3 h-3 mr-1.5 shrink-0 text-slate-400"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                {{ $chambre->capacity }} pers.
                            </span>
                        </div>

                        <a href="{{ route('chambres.show', $chambre->id) }}" class="text-indigo-600 font-semibold text-sm mb-6 hover:text-indigo-800 transition-colors inline-flex items-center">
                            Voir les détails 
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>

                        <div class="mt-auto pt-5 border-t border-slate-100 flex flex-col sm:flex-row gap-3">
                            
                            <a href="{{ route('chambres.edit', $chambre->id) }}"
                               class="flex-1 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold py-2.5 px-4 rounded-xl text-sm text-center transition-colors duration-200 shadow-sm">
                                Modifier
                            </a>

                            <form method="POST"
                                  action="{{ route('chambres.destroy', $chambre->id) }}"
                                  class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?')" class="w-full bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-2.5 px-4 rounded-xl text-sm border border-transparent transition-colors duration-200">
                                    Supprimer
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>