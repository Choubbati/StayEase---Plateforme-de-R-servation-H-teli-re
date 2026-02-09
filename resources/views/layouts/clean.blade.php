<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>StayEase | Votre séjour commence ici</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-900">
@guest

    <nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
            <span class="text-2xl font-extrabold tracking-tight text-slate-900">
                Stay<span class="text-indigo-600">Ease</span>
            </span>        <div class="hidden md:flex gap-8 font-medium text-gray-600">
            <a href="{{ route('hotels.hotels') }}" class="hover:text-indigo-600 transition">Hôtels</a>
            <a href="#" class="hover:text-indigo-600 transition">Destinations</a>
            <a href="#" class="hover:text-indigo-600 transition">À propos</a>
        </div>
        <div class="flex gap-4">
            <a href="/login"><button class="px-5 py-2 font-semibold text-gray-700">Connexion</button></a>
            <a href="/signup"><button class="px-5 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition">S'inscrire</button></a>
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
            <a href="/login"><button class="px-5 py-2 font-semibold text-gray-700">Profile</button></a>
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-5 py-2 bg-transparent text-red-500 border border-red-500 font-semibold rounded-lg shadow-md hover:bg-red-500 hover:text-white transition">Deconnection</button>
            </form>
        </div>
    </nav>
@endauth

@yield('childContent')

</body>
</html>
