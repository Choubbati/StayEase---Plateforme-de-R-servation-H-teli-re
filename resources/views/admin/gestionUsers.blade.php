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
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 bg-indigo-50 text-indigo-700 rounded-xl font-bold">
                    <i class="fa-solid fa-chart-pie"></i> Vue d'ensemble
                </a>

                <div class="mt-8 mb-2 px-4 text-[11px] font-black text-slate-400 uppercase tracking-widest">Contrôle
                    Réseau</div>

                <a href="#"
                    class="flex items-center justify-between px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-indigo-600 rounded-xl transition group">
                    <div class="flex items-center gap-3" id="hotels">
                        <i class="fa-solid fa-hotel group-hover:scale-110 transition"></i>
                        <span>Validation Hôtels</span>
                    </div>
                    <span class="bg-indigo-600 text-white text-[10px] px-2 py-0.5 rounded-full font-black">8</span>
                </a>

                <a href="{{ route('gestionGerants') }}"
                    class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-indigo-600 rounded-xl transition group">
                    <i class="fa-solid fa-user-tie"></i>
                    <span>Validation des Gérants</span>
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-indigo-600 rounded-xl transition group">
                    <i class="fa-solid fa-users"></i>
                    <span>Comptes Clients</span>
                </a>
                <a href="#"
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


<div class="p-10 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-black text-slate-800">Comptes Clients</h2>
            <p class="text-sm text-slate-400 font-bold uppercase tracking-widest">Gestion des voyageurs inscrits</p>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-left">
            <thead class="text-slate-400 text-[10px] uppercase font-black tracking-widest bg-slate-50/50">
                <tr>
                    <th class="px-10 py-5">Utilisateur</th>
                    <th class="px-10 py-5">Date d'adhésion</th>
                    <th class="px-10 py-5">Réservations effectuées</th>
                    <th class="px-10 py-5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <tr class="hover:bg-indigo-50/30 transition">
                    <td class="px-10 py-6">
                        <div class="flex items-center gap-4">
                            <div class="h-10 w-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-500 font-black">AM</div>
                            <div>
                                <p class="font-black text-slate-800 text-sm">Alice Martin</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase">alice@email.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-10 py-6 text-sm text-slate-500">12 Janv 2026</td>
                    <td class="px-10 py-6"><span class="font-bold text-slate-700">4</span></td>
                    <td class="px-10 py-6 text-right">
                        <button class="text-red-500 hover:bg-red-50 px-3 py-1.5 rounded-lg text-xs font-black uppercase transition">Bannir</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    @vite(['resources/js/app.js'])
</body>

</html> 