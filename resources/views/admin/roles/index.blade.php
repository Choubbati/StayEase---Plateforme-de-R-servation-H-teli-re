<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayEase | Matrice des Rôles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-[#fcfcfd] font-sans antialiased text-slate-900">

    <div class="flex min-h-screen">
        <aside class="w-72 bg-white border-r border-slate-200 hidden lg:flex flex-col">
            <div class="p-8">
                <div class="flex items-center gap-3">
                    <h1 class="text-slate-900 text-2xl font-black tracking-tight">Stay<span
                            class="text-indigo-600">Ease</span></h1>
                </div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-4 ml-1">Administration
                    Système</p>
            </div>

            <nav class="flex-1 px-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 hover:bg-indigo-50 hover:text-indigo-700 rounded-xl font-bold transition">
                    <i class="fa-solid fa-chart-pie"></i> Vue d'ensemble
                </a>

                <div class="mt-8 mb-2 px-4 text-[11px] font-black text-slate-400 uppercase tracking-widest">Contrôle
                    Réseau</div>

                <a href="{{ route('admin.hotels.validation') }}"
                    class="flex items-center justify-between px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-indigo-600 rounded-xl transition group">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-hotel group-hover:scale-110 transition"></i>
                        <span>Validation Hôtels</span>
                    </div>
                    <span class="bg-indigo-600 text-white text-[10px] px-2 py-0.5 rounded-full font-black">8</span>
                </a>

                <a href="{{ route('admin.gerants.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-indigo-600 rounded-xl transition group">
                    <i class="fa-solid fa-user-tie"></i>
                    <span>Gestion des Gérants</span>
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-indigo-600 rounded-xl transition group">
                    <i class="fa-solid fa-users"></i>
                    <span>Comptes Clients</span>
                </a>
                <a href="{{ route('admin.roles.index') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-indigo-50 text-indigo-700 rounded-xl transition group font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <span>Roles</span>
                </a>
            </nav>

            <div class="p-6 mt-auto border-t border-slate-100">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="flex items-center gap-3 w-full px-4 py-3 text-sm font-bold text-red-500 hover:bg-red-50 rounded-xl transition">
                        <i class="fa-solid fa-power-off"></i> Déconnexion
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 bg-slate-50 min-h-screen">
            <header class="bg-white border-b border-slate-200 px-10 py-6 sticky top-0 z-10">
                <h2 class="text-2xl font-black text-slate-800 tracking-tight">Matrice des Rôles</h2>
                <p class="text-[11px] text-slate-400 font-bold uppercase tracking-widest mt-1">Définition des accès StayEase</p>
            </header>

            <div class="p-10 max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-[3rem] p-10 shadow-sm border border-slate-100 flex flex-col items-center text-center">
                    <div class="h-16 w-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-6 italic font-black">V</div>
                    <h3 class="text-xl font-black text-slate-800 uppercase tracking-tighter mb-4">Voyageur</h3>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mb-8">Accès standard : Recherche d'hôtels, réservation, gestion du profil personnel et dépôt d'avis.</p>
                    <div class="mt-auto w-full py-4 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Rôle par défaut</span>
                    </div>
                </div>

                <div class="bg-white rounded-[3rem] p-10 shadow-xl shadow-indigo-100 border border-indigo-100 flex flex-col items-center text-center relative">
                    <div class="absolute -top-3 px-4 py-1 bg-indigo-600 text-white text-[10px] font-black rounded-full uppercase italic">Partenaire</div>
                    <div class="h-16 w-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-2xl mb-6 italic font-black">G</div>
                    <h3 class="text-xl font-black text-slate-800 uppercase tracking-tighter mb-4">Gérant</h3>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mb-8">Accès professionnel : Gestion des chambres, suivi des revenus, modification des infos de l'hôtel.</p>
                    <div class="mt-auto w-full py-4 bg-indigo-50 rounded-2xl border border-indigo-100">
                        <span class="text-[10px] font-black text-indigo-600 uppercase tracking-widest italic">Nécessite Validation</span>
                    </div>
                </div>

                <div class="bg-slate-900 rounded-[3rem] p-10 shadow-2xl shadow-slate-300 flex flex-col items-center text-center">
                    <div class="h-16 w-16 bg-slate-800 text-indigo-400 rounded-2xl flex items-center justify-center text-2xl mb-6 italic font-black">A</div>
                    <h3 class="text-xl font-black text-white uppercase tracking-tighter mb-4">Super Admin</h3>
                    <p class="text-xs text-slate-500 font-medium leading-relaxed mb-8">Accès total : Modération des utilisateurs, validation juridique des hôtels, paramétrage global du système.</p>
                    <div class="mt-auto w-full py-4 bg-slate-800 rounded-2xl">
                        <span class="text-[10px] font-black text-indigo-400 uppercase tracking-widest italic">Accès Niveau 1</span>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @vite(['resources/js/app.js'])
</body>

</html>
