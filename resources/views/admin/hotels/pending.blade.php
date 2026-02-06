<div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow">

    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
        Hôtels en attente de validation
    </h2>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 text-green-700 px-4 py-2 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if($hotels->count() === 0)
        <div class="rounded-lg bg-blue-100 text-blue-700 px-4 py-2 text-sm">
            Aucun hôtel en attente.
        </div>
    @else

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
            <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-6 py-3">Nom</th>
                    <th class="px-6 py-3">Ville</th>
                    <th class="px-6 py-3">Créé le</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($hotels as $hotel)
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                        {{ $hotel->nom }}
                    </td>

                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                     bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300">
                            {{ $hotel->ville }}
                        </span>
                    </td>

                    <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                        {{ $hotel->created_at->format('d/m/Y') }}
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-2">
                            <form method="POST" action="{{ route('admin.hotels.approve', $hotel) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="inline-flex items-center gap-1 bg-green-600 hover:bg-green-700 
                                           text-white text-xs font-medium px-3 py-1.5 rounded-lg transition">
                                    ✔ Approuver
                                </button>
                            </form>

                            <form method="POST" action="{{ route('admin.hotels.reject', $hotel) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="inline-flex items-center gap-1 bg-red-600 hover:bg-red-700 
                                           text-white text-xs font-medium px-3 py-1.5 rounded-lg transition">
                                    ✖ Rejeter
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $hotels->links() }}
    </div>

    @endif
</div>