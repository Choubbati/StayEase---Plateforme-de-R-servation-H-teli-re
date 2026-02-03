<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayEase | Créer un compte</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-6">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-8 md:p-10">
            <div class="text-center mb-10">
                <div class="inline-block p-3 bg-indigo-50 rounded-2xl mb-4">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                </div>
                <h1 class="text-2xl font-extrabold text-gray-900">Rejoindre StayEase</h1>
                <p class="text-gray-500 mt-2 text-sm">Commencez à planifier vos voyages d'exception.</p>
            </div>

            <form action="#" class="space-y-5">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2 ml-1">Nom complet</label>
                    <input type="text" placeholder="Jean Dupont" 
                           class="w-full p-4 bg-gray-50 border border-transparent rounded-xl focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2 ml-1">Adresse Email</label>
                    <input type="email" placeholder="jean@exemple.com" 
                           class="w-full p-4 bg-gray-50 border border-transparent rounded-xl focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2 ml-1">Mot de passe</label>
                    <input type="password" placeholder="••••••••" 
                           class="w-full p-4 bg-gray-50 border border-transparent rounded-xl focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2 ml-1">Confirmer le mot de passe</label>
                    <input type="password" placeholder="••••••••" 
                           class="w-full p-4 bg-gray-50 border border-transparent rounded-xl focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 outline-none transition-all">
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition active:scale-[0.98] mt-4">
                    Créer mon compte
                </button>
            </form>

            <p class="text-center mt-8 text-sm text-gray-500">
                Déjà membre ? 
                <a href="/login" class="text-indigo-600 font-bold hover:underline">Se connecter</a>
            </p>
        </div>
        
        <div class="bg-gray-50 p-6 text-center border-t border-gray-100">
            <p class="text-[10px] text-gray-400 leading-relaxed uppercase tracking-tighter">
                En vous inscrivant, vous acceptez nos <br> 
                <span class="underline cursor-pointer">Conditions d'utilisation</span> et notre <span class="underline cursor-pointer">Politique de confidentialité</span>.
            </p>
        </div>
    </div>

</body>
</html>