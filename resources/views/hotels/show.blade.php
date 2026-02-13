@extends('layouts.clean')

@section('childContent')

<div class="bg-slate-50 text-slate-900 min-h-screen py-10 px-4">

    <div class="max-w-6xl mx-auto space-y-10">

        <section class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row border border-slate-100">

            <div class="w-full md:w-5/12 h-72 md:h-auto bg-slate-200">
                <img src="{{ $hotel->image }}" class="w-full h-full object-cover" alt="ddd">
            </div>

            <div class="w-full md:w-7/12 p-8 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start">
                        <h1 class="text-3xl font-extrabold">{{ $hotel->nom }}</h1>

                        @if(auth()->user()->role->id === 2)
                            <div class="flex gap-2">
                                <a href="{{ route('hotels.edit', $hotel) }}" class="p-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('hotels.destroy', $hotel) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <p class="text-indigo-600 font-medium">{{ $hotel->ville }}</p>
                    <p class="mt-4 text-slate-600 leading-relaxed">{{ $hotel->description }}</p>
                </div>

                <div class="mt-8">
                    <a href="{{ route('hotels.hotels') }}" class="text-sm font-bold text-slate-400 hover:text-indigo-600 transition">
                        ← Retour à la liste
                    </a>
                </div>
            </div>
        </section>

        <div>
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold">Chambres disponibles</h2>

                @if(auth()->user()->role->id === 2)
                    <a href="{{ route('chambres.create', ['hotel_id' => $hotel->id]) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                        + Ajouter une chambre
                    </a>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($hotel->chambres as $chambre)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden flex group">
                        <div class="w-1/3 overflow-hidden">
                            <img src="/assets/images/{{ $chambre->image }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="">
                        </div>
                        <div class="w-2/3 p-5 flex flex-col justify-between">

                            <div class="flex justify-between">
                                <h3 class="font-bold text-slate-900">N° {{ $chambre->number }}</h3>
                                <span class="text-indigo-600 font-bold">{{ $chambre->category->nom }}</span>
                            </div>

                            <div class="flex items-center justify-between mt-4">
                                    <span class="text-xs text-slate-500 font-medium">Capacité : {{ $chambre->capacity }} pers.</span>
                                    <span class="text-indigo-600 font-bold">{{ $chambre->price_per_night }}€</span>
                            </div>
                            <div class="flex mt-3 justify-end">
                                @if(Auth::user()->role->id === 3)
                                <button class="bg-slate-900  text-white px-4 py-1.5 rounded-lg text-xs font-bold hover:bg-indigo-600 transition">
                                    Réserver

                                    @endif

                                @if(auth()->user()->role->id === 2)
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
                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection
