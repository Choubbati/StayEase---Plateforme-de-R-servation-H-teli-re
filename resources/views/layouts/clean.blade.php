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
        <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tight text-slate-900">
            Stay<span class="text-indigo-600">Ease</span>
        </a>
        <div class="hidden md:flex gap-8 font-medium text-gray-600">
            <a href="{{ route('hotels.hotels') }}" class="hover:text-indigo-600 transition">Hôtels</a>
            <a href="#" class="hover:text-indigo-600 transition">Destinations</a>
            <a href="#" class="hover:text-indigo-600 transition">À propos</a>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('login') }}">
                <button class="px-5 py-2 font-semibold text-gray-700">Connexion</button>
            </a>
            <a href="{{ route('register') }}">
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
        <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tight text-slate-900">
            Stay<span class="text-indigo-600">Ease</span>
        </a>        <div class="hidden md:flex gap-8 font-medium text-gray-600">
            <a href="{{ route('hotels.hotels') }}" class="hover:text-indigo-600 transition">Hôtels</a>
            <a href="#about" class="hover:text-indigo-600 transition">À propos</a>
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

@yield('childContent')

<footer class="py-10 text-center border-t border-gray-200 text-gray-400 text-sm">
    &copy; 2026 StayEase - Agence Digital Travel. Tous droits réservés.
</footer>

</body>
</html>
