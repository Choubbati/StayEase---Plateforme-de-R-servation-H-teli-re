<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayEase | Administration Centrale</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#fcfcfd] antialiased text-slate-900">

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
                        {{ strtoupper(Auth::user()->Firstname[0] . Auth::user()->Lastname[0]) }}
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


</body>

</html>
