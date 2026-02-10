<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil | StayEase</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 font-sans antialiased">

    <nav class="bg-white border-b border-slate-100 px-8 py-4">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-black text-indigo-600">StayEase</a>
            <a href="{{ route('home') }}" class="text-sm font-bold text-slate-400 hover:text-indigo-600">Retour</a>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto py-12 px-6">
        


        <div class="grid grid-cols-1 gap-8">
            
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                <div class="flex justify-between items-start mb-8">
                    <h2 class="text-xl font-black text-slate-800 uppercase tracking-tight">Mes Informations</h2>
                    <button type="button" onclick="openProfileModal()" class="text-indigo-600 font-bold text-sm hover:underline">
                        Modifier le profil
                    </button>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center gap-6">
                        <div class="h-20 w-20 bg-indigo-600 rounded-2xl flex items-center justify-center text-white text-3xl font-black">
                            {{strtoupper($user->Firstname[0] . $user->Lastname[0])}}
                        </div>
                        <div>
                            <p class="text-2xl font-black text-slate-900">{{ Auth::user()->Firstname }} {{ Auth::user()->Lastname }}</p>
                            <p class="text-slate-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <div class="border-t border-slate-200 pt-6">
                        <h3 class="text-sm font-black text-slate-600 uppercase tracking-wide mb-4">Détails du compte</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase">Prénom</p>
                                <p class="text-slate-800 font-semibold mt-1">{{ $user->Firstname }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase">Nom</p>
                                <p class="text-slate-800 font-semibold mt-1">{{ $user->Lastname }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase">Email</p>
                                <p class="text-slate-800 font-semibold mt-1">{{ $user->email }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase">Identifiant</p>
                                <p class="text-slate-800 font-semibold mt-1">#{{ $user->id }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase">Rôle</p>
                                <p class="text-slate-800 font-semibold mt-1">
                                    @if($user->role_id == 1)
                                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">Administrateur</span>
                                    @elseif($user->role_id == 2)
                                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">Gérant d'Hôtel</span>
                                    @else
                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Client</span>
                                    @endif
                                </p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase">Date d'inscription</p>
                                <p class="text-slate-800 font-semibold mt-1">{{ $user->created_at->format('d/m/Y à H:i') }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase">Dernière mise à jour</p>
                                <p class="text-slate-800 font-semibold mt-1">{{ $user->updated_at->format('d/m/Y à H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->role_id == 3)
            <div class="bg-indigo-900 rounded-3xl p-8 text-white relative overflow-hidden shadow-xl shadow-indigo-100">
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div>
                        <h3 class="text-xl font-black mb-2">Devenir Gérant d'Hôtel</h3>
                        <p class="text-indigo-200 text-sm max-w-md">Envoyez une demande pour transformer votre compte et commencer à publier vos propres établissements sur StayEase.</p>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <button type="submit" class="bg-white text-indigo-900 px-8 py-3 rounded-xl font-black hover:bg-indigo-50 transition whitespace-nowrap">
                            Envoyer la demande
                        </button>
                    </form>
                </div>
                <i class="fa-solid fa-hotel absolute right-[-20px] bottom-[-20px] text-indigo-800 text-9xl opacity-50"></i>
            </div>
            @endif

        </div>
    </main>

{{-- modal for edit profile --}}
    <div id="profileModal" class="fixed inset-0 bg-slate-900/40 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-black text-slate-800">Modifier le profil</h3>
                <button type="button" onclick="closeProfileModal()" class="text-slate-400 hover:text-slate-600 text-xl">&times;</button>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase">Prénom</label>
                        <input type="text" name="Firstname" value="{{ Auth::user()->Firstname }}" class="w-full mt-1 p-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-indigo-600">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase">Nom</label>
                        <input type="text" name="Lastname" value="{{ Auth::user()->Lastname }}" class="w-full mt-1 p-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-indigo-600">
                    </div>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full mt-1 p-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-indigo-600">
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="closeProfileModal()" class="bg-slate-100 text-slate-600 px-5 py-2 rounded-xl font-bold text-sm">Annuler</button>
                    <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded-xl font-bold text-sm">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openProfileModal() {
            document.getElementById('profileModal').classList.remove('hidden');
        }
        function closeProfileModal() {
            document.getElementById('profileModal').classList.add('hidden');
        }
    </script>

</body>
</html>