<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayEase | Votre séjour commence ici</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style> body {
            font-family: 'Inter', sans-serif;
        } </style>
</head>
<body class="bg-gray-50 text-gray-900">
@guest

    <nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
            <span class="text-2xl font-extrabold tracking-tight text-slate-900">
                Stay<span class="text-indigo-600">Ease</span>
            </span>
        <div class="hidden md:flex gap-8 font-medium text-gray-600">
            <a href="{{ route('hotels.hotels') }}" class="hover:text-indigo-600 transition">Hôtels</a>
            <a href="#" class="hover:text-indigo-600 transition">Destinations</a>
            <a href="#" class="hover:text-indigo-600 transition">À propos</a>
        </div>
        <div class="flex gap-4">
            <a href="/login">
                <button class="px-5 py-2 font-semibold text-gray-700">Connexion</button>
            </a>
            <a href="/signup">
                <button
                    class="px-5 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition">
                    S'inscrire
                </button>
            </a>
        </div>
    </nav>
@endguest
@auth
    <nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
            <span class="text-2xl font-extrabold tracking-tight text-slate-900">
                Stay<span class="text-indigo-600">Ease</span>
            </span>        <div class="hidden md:flex gap-8 font-medium text-gray-600">
                <a href="{{ route('hotels.hotels') }}" class="hover:text-indigo-600 transition">Hôtels</a>
                <a href="#" class="hover:text-indigo-600 transition">Destinations</a>
                <a href="#" class="hover:text-indigo-600 transition">À propos</a>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('profile') }}">
                    <div class="h-10 w-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center font-black">
                        {{ strtoupper(Auth::user()->Firstname[0] . Auth::user()->Lastname[0]) }}
                    </div>
                </a>                <form method="post" action="{{ route('logout') }}">
                    @csrf
                <button type="submit" class="px-5 py-2 bg-transparent text-red-500 border border-red-500 font-semibold rounded-lg shadow-md hover:bg-red-500 hover:text-white transition">Deconnection</button>
                </form>
            </div>
        </nav>
@endauth
@guest

    <header class="max-w-7xl mx-auto px-10 py-20 flex flex-col md:flex-row items-center gap-12">
        <div class="flex-1">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6">
                Réservez l'hôtel de vos <span class="text-indigo-600">rêves</span>.
            </h1>
            <p class="text-lg text-gray-500 mb-10">
                Découvrez une sélection exclusive d'hôtels pour vos voyages d'affaires ou vos vacances en famille.
                Simple, rapide et sécurisé.
            </p>

            <div class="flex p-2 bg-white rounded-xl shadow-xl border border-gray-100">
                <input type="text" placeholder="Où allez-vous ?" class="flex-1 p-4 outline-none text-gray-700">
                <button class="bg-indigo-600 text-white px-8 py-4 rounded-lg font-bold hover:bg-indigo-700 transition">
                    Rechercher
                </button>
            </div>
        </div>

        <div class="flex-1">
            <img
                src="https://images.trvl-media.com/lodging/23000000/22890000/22882300/22882236/31e6e20e.jpg?impolicy=resizecrop&rw=1200&ra=fit"
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
                Découvrez une sélection exclusive d'hôtels pour vos voyages d'affaires ou vos vacances en famille.
                Simple, rapide et sécurisé.
            </p>

            <div class="flex p-2 bg-white rounded-xl shadow-xl border border-gray-100">
                <input type="text" placeholder="Où allez-vous ?" class="flex-1 p-4 outline-none text-gray-700">
                <button class="bg-indigo-600 text-white px-8 py-4 rounded-lg font-bold hover:bg-indigo-700 transition">
                    Rechercher
                </button>
            </div>
        </div>

        <div class="flex-1">
            <img
                src="https://images.trvl-media.com/lodging/23000000/22890000/22882300/22882236/31e6e20e.jpg?impolicy=resizecrop&rw=1200&ra=fit"
                alt="Hotel luxe"
                class="rounded-3xl shadow-2xl">
        </div>
    </header>
@endauth

@guest
        <section class="max-w-7xl mx-auto px-10 py-20">
            <h2 class="text-3xl font-bold mb-10">Nos offres à la une</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($hotelsApprouved as $hotelapproved)
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition border border-gray-100">
                    <img src="{{ $hotelapproved->image }}" class="h-56 w-full object-cover" alt="image Hotel">
                    <div class="p-6">
                        <div class="mt-6 flex justify-between items-center">
                            <span
                                class="text-indigo-600 font-bold text-sm uppercase">{{ $hotelapproved->ville }}</span>
                            <span
                                class="text-indigo-600 font-bold text-sm uppercase">categorie</span>
                        </div>
                        <h3 class="text-xl font-bold mt-2"> {{$hotelapproved->nom}} </h3>
                        <p class="text-gray-500 mt-2 text-sm italic">{{ $hotelapproved->description }}</p>
                        <div class="mt-6 flex justify-between items-center">
                            <!-- <span class="text-2xl font-bold">150€<span class="text-sm text-gray-400 font-normal">/nuit</span></span> -->
                            <a href="{{ route('hotels.detail', $hotelapproved) }}" class="text-indigo-600 font-bold hover:underline">Voir l'offre</a>
                        </div>
                    </div>
                </div>

                @empty
                    <div class="flex justify-center">
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition border border-gray-100">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/052/947/382/small/modern-and-clean-design-of-a-hotel-building-icon-for-graphic-representation-vector.jpg" class="h-56 w-full object-cover" alt="image Hotel">

                            <div class="p-6">
                                <h3 class="text-xl font-bold mt-2">Aucun Hotels existes</h3>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
            <h1> {{ $hotelsApprouved->links() }}</h1>
        </section>
@endguest

<footer class="py-10 text-center border-t border-gray-200 text-gray-400 text-sm">
    &copy; 2026 StayEase - Agence Digital Travel. Tous droits réservés.
</footer>

</body>
</html>
