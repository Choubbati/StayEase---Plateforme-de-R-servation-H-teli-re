<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayEase | Rejoindre l'aventure</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .role-option input:checked + div {
            border-color: #4f46e5;
            background-color: #f5f3ff;
            ring: 4px;
            ring-color: #e0e7ff;
        }
    </style>
</head>

<body class="bg-slate-50 flex items-center justify-center min-h-screen p-6">

    <div class="max-w-xl w-full bg-white rounded-[2.5rem] shadow-2xl border border-slate-100 overflow-hidden">
        <div class="p-8 md:p-12">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-black text-slate-900 tracking-tighter italic">Stay<span class="text-indigo-600">Ease</span></h1>
                <p class="text-slate-500 mt-2 font-medium">Choisissez votre profil et commencez l'expérience.</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-2 gap-4 mb-8">
                    <label class="role-option cursor-pointer">
                        <input type="radio" name="role_id" value="3" class="hidden" checked>
                        <div class="border-2 border-slate-100 rounded-2xl p-4 text-center transition-all hover:border-indigo-200">
                            <i class="fa-solid fa-suitcase text-indigo-600 text-xl mb-2"></i>
                            <p class="text-sm font-black text-slate-800 uppercase tracking-tighter">Voyageur</p>
                            <p class="text-[10px] text-slate-400 mt-1">Je souhaite réserver</p>
                        </div>
                    </label>

                    <label class="role-option cursor-pointer">
                        <input type="radio" name="role_id" value="2" class="hidden">
                        <div class="border-2 border-slate-100 rounded-2xl p-4 text-center transition-all hover:border-indigo-200">
                            <i class="fa-solid fa-hotel text-slate-400 text-xl mb-2"></i>
                            <p class="text-sm font-black text-slate-800 uppercase tracking-tighter">Gérant</p>
                            <p class="text-[10px] text-slate-400 mt-1">Je possède un hôtel</p>
                        </div>
                    </label>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="prenom" class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 ml-1">Prénom</label>
                        <input id="prenom" name="prenom" type="text" required placeholder="Jean"
                            class="w-full p-4 bg-slate-50 border border-transparent rounded-2xl focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 outline-none transition-all text-sm font-medium">
                    </div>
                    <div>
                        <label for="nom" class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 ml-1">Nom</label>
                        <input id="nom" name="nom" type="text" required placeholder="Dupont"
                            class="w-full p-4 bg-slate-50 border border-transparent rounded-2xl focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 outline-none transition-all text-sm font-medium">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 ml-1">Adresse Email</label>
                    <input id="email" name="email" type="email" required placeholder="jean@stayease.com"
                        class="w-full p-4 bg-slate-50 border border-transparent rounded-2xl focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 outline-none transition-all text-sm font-medium">
                </div>

                <div>
                    <label for="password" class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 ml-1">Mot de passe</label>
                    <input id="password" name="password" type="password" required placeholder="••••••••"
                        class="w-full p-4 bg-slate-50 border border-transparent rounded-2xl focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 outline-none transition-all text-sm font-medium">
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 text-white font-black py-4 rounded-2xl shadow-xl shadow-indigo-100 hover:bg-slate-900 transition active:scale-[0.98] mt-4 uppercase tracking-widest text-xs">
                    Créer mon compte
                </button>
            </form>

            <p class="text-center mt-8 text-xs font-bold text-slate-400">
                Déjà parmi nous ?
                <a href="/login" class="text-indigo-600 hover:underline">Se connecter</a>
            </p>
        </div>
    </div>

</body>
</html>