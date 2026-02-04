<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayEase | Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-6">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-8 md:p-10">
            <div class="text-center mb-10">
                <div class="inline-block p-3 bg-indigo-50 rounded-2xl mb-4">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                </div>
                <h1 class="text-2xl font-extrabold text-gray-900">Bon retour !</h1>
                <p class="text-gray-500 mt-2 text-sm">Connectez-vous pour gérer vos réservations.</p>
            </div>

            <form action="/login" class="space-y-6" method="POST">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2 ml-1">Adresse Email</label>
                    <input name="email" type="email" placeholder="votre@email.com" 
                           class="w-full p-4 bg-gray-50 border border-transparent rounded-xl focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 outline-none transition-all">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2 ml-1">
                        <label class="text-xs font-bold uppercase tracking-wider text-gray-400">Mot de passe</label>
                    </div>
                    <input name="password" type="password" placeholder="••••••••" 
                           class="w-full p-4 bg-gray-50 border border-transparent rounded-xl focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 outline-none transition-all">
                </div>



                <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition active:scale-[0.98]">
                    Se connecter
                </button>
            </form>

            <p class="text-center mt-8 text-sm text-gray-500">
                Pas encore de compte ? 
                <a href="/signup" class="text-indigo-600 font-bold hover:underline">Créer un compte</a>
            </p>
        </div>
    </div>


</body>
</html>