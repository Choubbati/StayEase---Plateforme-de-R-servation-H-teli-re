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
                    <button onclick="toggleEdit()" id="x-laravel-exceptions-renderer::badgeditBtn" class="text-indigo-600 font-bold text-sm hover:underline">
                        Modifier le profil
                    </button>
                </div>

                <div id="viewMode" class="space-y-6">
                    <div class="flex items-center gap-6">
                        <div class="h-20 w-20 bg-indigo-600 rounded-2xl flex items-center justify-center text-white text-3xl font-black">
                            {{ substr(Auth::user()->Firstname, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-2xl font-black text-slate-900">{{ Auth::user()->Firstname }} {{ Auth::user()->Lastname }}</p>
                            <p class="text-slate-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>

                <form id="editMode" action="" method="POST" class="hidden space-y-4">
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
                    <div class="flex gap-3 pt-2">
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-xl font-bold text-sm">Enregistrer</button>
                        <button type="button" onclick="toggleEdit()" class="bg-slate-100 text-slate-600 px-6 py-2 rounded-xl font-bold text-sm">Annuler</button>
                    </div>
                </form>
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

    <script>
        function toggleEdit() {
            document.getElementById('viewMode').classList.toggle('hidden');
            document.getElementById('editMode').classList.toggle('hidden');
            document.getElementById('editBtn').classList.toggle('hidden');
        }
    </script>
</body>
</html>