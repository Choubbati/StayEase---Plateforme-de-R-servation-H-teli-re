<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayEase | Administration Centrale</title>
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
                    class="flex items-center gap-3 px-4 py-3 bg-indigo-50 text-indigo-700 rounded-xl font-bold transition">
                    <i class="fa-solid fa-chart-pie"></i> Vue d'ensemble
                </a>

                <div class="mt-8 mb-2 px-4 text-[11px] font-black text-slate-400 uppercase tracking-widest">Contrôle
                    Réseau</div>

                <a href="{{ route('admin.hotels.validation') }}"
                    class="flex items-center justify-between px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-indigo-600 rounded-xl transition group cursor-pointer">
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
                    class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-indigo-600 rounded-xl transition group">
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

        <main class="flex-1 overflow-y-auto" id="dashboardMain">
            <header
                class="bg-white/80 backdrop-blur-md border-b border-slate-100 px-8 py-5 flex justify-between items-center sticky top-0 z-20">
                <h2 class="text-xl font-black text-slate-800 tracking-tight">Console de Supervision</h2>

                <div class="flex items-center gap-4">
                    <div class="flex flex-col items-end">
                        <span class="text-sm font-black text-slate-900">{{ Auth::user()->Firstname }}</span>
                        <span class="text-[10px] text-indigo-600 font-bold uppercase tracking-tighter">Super
                            Admin</span>
                    </div>
                    <div
                        class="h-11 w-11 rounded-xl bg-slate-900 flex items-center justify-center text-white font-black shadow-lg shadow-slate-200">
                        {{ substr(Auth::user()->Firstname, 0, 1) }}
                    </div>
                </div>
            </header>

            <div class="p-8 max-w-7xl mx-auto" id="dashboardAdmin">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div
                        class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm group hover:border-indigo-200 transition">
                        <p class="text-slate-400 text-[11px] font-black uppercase tracking-widest mb-2">Chiffre
                            d'Affaire Réseau</p>
                        <div class="flex items-baseline gap-2">
                            <h3 class="text-3xl font-black text-slate-900">542,800 €</h3>
                            <span class="text-green-500 text-xs font-bold">+15%</span>
                        </div>
                    </div>

                    <div
                        class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm group hover:border-indigo-200 transition">
                        <p class="text-slate-400 text-[11px] font-black uppercase tracking-widest mb-2">Revenus
                            Commissions</p>
                        <div class="flex items-baseline gap-2">
                            <h3 class="text-3xl font-black text-indigo-600">81,420 €</h3>
                            <span class="text-slate-400 text-xs font-bold">Net</span>
                        </div>
                    </div>

                    <div
                        class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm group hover:border-indigo-200 transition">
                        <p class="text-slate-400 text-[11px] font-black uppercase tracking-widest mb-2">Hôtels Actifs
                        </p>
                        <div class="flex items-baseline gap-2">
                            <h3 class="text-3xl font-black text-slate-900">124</h3>
                            <span class="text-amber-500 text-xs font-bold">8 en attente</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                    <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                        <div>
                            <h3 class="font-black text-slate-800 text-lg">Demandes de partenariat</h3>
                            <p class="text-sm text-slate-500">Hôtels souhaitant rejoindre le réseau StayEase</p>
                        </div>
                        <button
                            class="bg-slate-900 text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:bg-indigo-600 transition" id="test">Voir
                            tout le catalogue</button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead
                                class="bg-slate-50/50 text-slate-400 text-[10px] uppercase font-black tracking-widest">
                                <tr>
                                    <th class="px-8 py-4">Établissement</th>
                                    <th class="px-8 py-4">Propriétaire</th>
                                    <th class="px-8 py-4">Documents</th>
                                    <th class="px-8 py-4">Date de demande</th>
                                    <th class="px-8 py-4 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                <tr class="hover:bg-indigo-50/20 transition">
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="h-10 w-10 bg-indigo-100 rounded-lg flex items-center justify-center text-indigo-600 font-bold">
                                                H</div>
                                            <span class="font-bold text-slate-800 text-sm">Grand Riviera Resort</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 text-sm text-slate-600">Sophie Lefebvre</td>
                                    <td class="px-8 py-5">
                                        <span class="flex items-center gap-1 text-[10px] font-black text-indigo-600">
                                            <i class="fa-solid fa-file-circle-check"></i> DOSSIER COMPLET
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 text-xs text-slate-400 italic">Il y a 2 heures</td>
                                    <td class="px-8 py-5 text-right">
                                        <div class="flex justify-end gap-2">
                                            <button
                                                class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-indigo-700 transition shadow-md shadow-indigo-100">Approuver</button>
                                            <button
                                                class="p-2 bg-slate-100 text-slate-400 rounded-lg hover:bg-red-50 hover:text-red-500 transition"><i
                                                    class="fa-solid fa-trash text-xs"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @vite(['resources/js/app.js'])
</body>

</html>
            <header class="flex justify-between items-center mb-10">
                <div>
                    <h2 class="text-2xl font-black text-slate-800 uppercase tracking-tight">Gestion des Gérants</h2>
                    <p class="text-sm text-slate-500 font-medium">Supervisez les comptes partenaires de StayEase</p>
                </div>
                <button class="bg-indigo-600 text-white px-6 py-3 rounded-2xl font-black text-xs uppercase tracking-widest hover:shadow-lg hover:shadow-indigo-200 transition">
                    + Ajouter un gérant
                </button>
            </header>

            <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-50 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            <th class="px-8 py-5">Gérant</th>
                            <th class="px-8 py-5">Établissements</th>
                            <th class="px-8 py-5">Date d'inscription</th>
                            <th class="px-8 py-5">Statut</th>
                            <th class="px-8 py-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                       
                        <tr class="hover:bg-indigo-50/20 transition">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 font-bold">
                                       
                                    </div>
                                    <div>
                                        <p class="text-sm font-black text-slate-800">jldskn</p>
                                        <p class="text-xs text-slate-400">jvkdlfsnk</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-sm font-bold text-slate-600">
                                <span class="bg-slate-100 px-2 py-1 rounded-md text-[10px]">3 Hôtels</span>
                            </td>
                            <td class="px-8 py-6 text-sm text-slate-500">
                               
                            </td>
                            <td class="px-8 py-6">
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-black rounded-full uppercase">Actif</span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-2">
                                    <button title="Modifier" class="p-2 text-slate-400 hover:text-indigo-600"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button title="Suspendre" class="p-2 text-slate-400 hover:text-red-500"><i class="fa-solid fa-user-slash"></i></button>
                                </div>
                            </td>
                        </tr>
                
                    </tbody>
                </table>
                

            </div>
        </main>

        {{-- GESTION UTILISATEUR --}}

        <main class="flex-1 bg-slate-50 min-h-screen" id="users" style="display: none;">
    <header class="bg-white border-b border-slate-200 px-10 py-6 flex justify-between items-center sticky top-0 z-10">
        <div>
            <h2 class="text-2xl font-black text-slate-800 tracking-tight">Comptes Clients</h2>
            <p class="text-[11px] text-slate-400 font-bold uppercase tracking-widest mt-1">Répertoire des voyageurs StayEase</p>
        </div>
        <div class="flex items-center gap-4">
            <div class="relative">
                <input type="text" placeholder="Rechercher un client..." class="pl-10 pr-4 py-2 bg-slate-100 border-none rounded-xl text-xs focus:ring-2 focus:ring-indigo-500 w-64">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-2.5 text-slate-400 text-xs"></i>
            </div>
        </div>
    </header>

    <div class="p-10 max-w-7xl mx-auto">
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <table class="w-full text-left">
                <thead class="text-slate-400 text-[10px] uppercase font-black tracking-widest bg-slate-50/50">
                    <tr>
                        <th class="px-10 py-5">Utilisateur</th>
                        <th class="px-10 py-5">Statut</th>
                        <th class="px-10 py-5">Dernière Connexion</th>
                        <th class="px-10 py-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-10 py-6">
                            <div class="flex items-center gap-4">
                                <div class="h-10 w-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center font-black">TM</div>
                                <div>
                                    <p class="font-black text-slate-800 text-sm">Thomas Muller</p>
                                    <p class="text-[10px] text-slate-400 font-bold">thomas.m@gmail.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-6">
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-black rounded-full uppercase border border-green-200">Actif</span>
                        </td>
                        <td class="px-10 py-6 text-xs font-bold text-slate-500 italic">Il y a 2 heures</td>
                        <td class="px-10 py-6 text-right">
                            <button class="p-2 text-slate-400 hover:text-red-500 transition"><i class="fa-solid fa-ban"></i></button>
                        </td>
                    </tr>
                    </tbody>
            </table>
        </div>
    </div>
</main>

    {{-- VALIDATION HOTELS --}}

    <main class="flex-1 bg-slate-50 min-h-screen" id="hotels" style="display: none;">
    <header class="bg-white border-b border-slate-200 px-10 py-6 sticky top-0 z-10">
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">Hôtels en Attente</h2>
        <p class="text-[11px] text-amber-500 font-black uppercase tracking-widest mt-1 italic">8 Établissements demandent une validation</p>
    </header>

    <div class="p-10 max-w-7xl mx-auto space-y-6">
        <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm flex flex-col md:flex-row justify-between items-center gap-8 hover:border-indigo-300 transition-all border-l-8 border-l-amber-400">
            <div class="flex items-center gap-8">
                <div class="h-24 w-32 bg-slate-100 rounded-2xl overflow-hidden shadow-inner flex items-center justify-center">
                    <i class="fa-solid fa-image text-slate-300 text-3xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-black text-slate-800 italic">Ocean View Resort</h3>
                    <p class="text-xs text-indigo-600 font-bold uppercase mb-2">Gérant : Yassine Mansour</p>
                    <div class="flex gap-4">
                        <span class="text-[10px] bg-slate-100 px-2 py-1 rounded font-bold text-slate-500"><i class="fa-solid fa-bed mr-1"></i> 24 Chambres</span>
                        <span class="text-[10px] bg-slate-100 px-2 py-1 rounded font-bold text-slate-500"><i class="fa-solid fa-map-pin mr-1"></i> Casablanca</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-2 w-full md:w-auto">
                <button class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-indigo-700 shadow-lg shadow-indigo-100 transition">Valider l'entrée</button>
                <button class="bg-white text-slate-400 px-8 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:text-red-500 transition border border-slate-100">Rejeter le dossier</button>
            </div>
        </div>
    </div>
</main>

    {{-- GESTION ROLES --}}
    <main class="flex-1 bg-slate-50 min-h-screen" id="roles" style="display: none;">
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
    
    @vite(['resources/js/app.js', 'resources/js/admin.js'])
</body>

</html>
