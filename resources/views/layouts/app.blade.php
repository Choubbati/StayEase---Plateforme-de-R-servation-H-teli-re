@extends('layouts.clean')

@section('childContent')
    @guest
        <header class="max-w-7xl mx-auto px-10 py-20 flex flex-col md:flex-row items-center gap-12">
            <div class="flex-1">

                <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6">
                    Réservez l'hôtel de vos <span class="text-indigo-600">rêves</span>.
                </h1>
                <p class="text-lg text-gray-500 mb-10">
                    Découvrez une sélection exclusive d'hôtels pour vos voyages d'affaires ou vos vacances en famille. Simple, rapide et sécurisé.
                </p>

                <div class="flex p-2 bg-white rounded-xl shadow-xl border border-gray-100">
                    <input type="text" placeholder="Où allez-vous ?" class="flex-1 p-4 outline-none text-gray-700">
                    <button class="bg-indigo-600 text-white px-8 py-4 rounded-lg font-bold hover:bg-indigo-700 transition">Rechercher</button>
                </div>
            </div>

            <div class="flex-1">
                <img src="https://images.trvl-media.com/lodging/23000000/22890000/22882300/22882236/31e6e20e.jpg?impolicy=resizecrop&rw=1200&ra=fit"
                     alt="Hotel luxe"
                     class="rounded-3xl shadow-2xl">
            </div>
        </header>
    @endguest
    @auth
        <header class="max-w-7xl mx-auto px-10 py-20 flex flex-col md:flex-row items-center gap-12">
            <div class="flex-1">
                <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6">
                    Bienvenue , <span class="text-indigo-600">{{ Auth::user()->Firstname }}</span>.
                </h1>
                <p class="text-lg text-gray-500 mb-10">
                    Découvrez une sélection exclusive d'hôtels pour vos voyages d'affaires ou vos vacances en famille. Simple, rapide et sécurisé.
                </p>

                <div class="flex p-2 bg-white rounded-xl shadow-xl border border-gray-100">
                    <input type="text" placeholder="Où allez-vous ?" class="flex-1 p-4 outline-none text-gray-700">
                    <button class="bg-indigo-600 text-white px-8 py-4 rounded-lg font-bold hover:bg-indigo-700 transition">Rechercher</button>
                </div>
            </div>

            <div class="flex-1">
                <img src="https://images.trvl-media.com/lodging/23000000/22890000/22882300/22882236/31e6e20e.jpg?impolicy=resizecrop&rw=1200&ra=fit"
                     alt="Hotel luxe"
                     class="rounded-3xl shadow-2xl">
            </div>
        </header>
    @endauth

    @yield('content')

@endsection




