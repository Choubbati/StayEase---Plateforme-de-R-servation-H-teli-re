<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Chambre</title>
    <!-- Tailwind CSS via CDN for standalone usage -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex items-center justify-center py-10 px-4">

    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row">

        <!-- IMAGE SECTION (Left on Desktop, Top on Mobile) -->
        <div class="w-full md:w-5/12 h-64 md:h-auto relative bg-slate-200 overflow-hidden group">
            <img
                src="{{ $chambre->image }}"
                alt="Image de la chambre {{ $chambre->number }}"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
            >
        </div>

        <!-- CONTENT SECTION (Right on Desktop, Bottom on Mobile) -->
        <div class="w-full md:w-7/12 p-8 md:p-10 flex flex-col justify-between">

            <div>
                <!-- Header: Hotel Name & Room Number -->
                <div class="mb-6">
                    <h2 class="text-xs font-bold tracking-widest uppercase text-indigo-600 mb-2">
                        {{ $hotel->nom }}
                    </h2>
                    <h1 class="text-3xl font-extrabold text-slate-900 leading-tight">
                        Chambre {{ $chambre->number }}
                    </h1>
                </div>

                <!-- Price & Capacity Row -->
                <div class="flex flex-wrap gap-8 border-y border-slate-100 py-6 mb-8">
                    <div>
                        <span class="block text-sm font-medium text-slate-500 mb-1">Prix</span>
                        <span class="text-2xl font-bold text-slate-900">
                            {{ $chambre->price_per_night }} € <span class="text-base font-normal text-slate-500">/ nuit</span>
                        </span>
                    </div>
                    <div>
                        <span class="block text-sm font-medium text-slate-500 mb-1">Capacité</span>
                        <span class="text-2xl font-bold text-slate-900">
                            {{ $chambre->capacity }} <span class="text-base font-normal text-slate-500">pers.</span>
                        </span>
                    </div>
                </div>

                <!-- Tags Section -->
                <div class="mb-6">
                    <h5 class="text-sm font-bold text-slate-900 uppercase tracking-wide mb-3">
                        Tags
                    </h5>
                    <div class="flex flex-wrap gap-2">
                        @forelse ($chambre->tags as $tag)
                            <span class="px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-full">
                                {{ $tag->name }}
                            </span>
                        @empty
                            <span class="text-slate-400 text-sm italic">Aucun tag</span>
                        @endforelse
                    </div>
                </div>

                <!-- Properties Section -->
                <div class="mb-8">
                    <h5 class="text-sm font-bold text-slate-900 uppercase tracking-wide mb-3">
                        Propriétés
                    </h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @forelse ($chambre->properties as $property)
                            <div class="flex items-center gap-3 text-slate-600">
                                <!-- Check Icon SVG -->
                                <svg class="w-5 h-5 text-indigo-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="font-medium">{{ $property->nom }}</span>
                            </div>
                        @empty
                            <span class="text-slate-400 text-sm italic">Aucune propriété</span>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Action Footer -->
            <div class="pt-4 border-t border-slate-100">
                <a href="{{ route('chambres.index') }}" class="inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 border border-slate-300 text-slate-700 font-semibold rounded-lg hover:bg-slate-50 hover:text-slate-900 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour
                </a>
            </div>

        </div>
    </div>

</body>
</html>
