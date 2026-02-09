@extends('layouts.clean');
@section('childContent')


    <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
        <div class="flex items-center flex-1 space-x-4">
            <h5>
                <span class="text-gray-500">Tous les categories:</span>
                <span class="dark:text-white">{{ $count }}</span>
            </h5>
        </div>
        <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
            <a href="{{ route('categories.create') }}" type="button" class="flex items-center justify-center flex-shrink-0 px-5 py-3 text-sm font-medium text-white focus:outline-none bg-blue-600 rounded-lg border border-blue-200 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-200">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Ajouter nouveau Categorie
            </a>
        </div>
    </div>
    <div class="flex w-full mx-auto item-center">
    <div class="relative w-2/3 overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
            <tr class="bg-gray-200">
                <th scope="col" class="px-6 py-3 font-medium">
                    Nom Categorie
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Quantite
                </th>
                <th scope="col"  class="px-6 py-3 text-center font-medium">
                    Actions
                </th>

            </tr>
            </thead>
            <tbody>
            @forelse($categories as $categorie)
                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{ $categorie->nom }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{ $categorie->quantite }}
                    </th>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex items-center space-x-4">
                            <a href="{{route('categories.edit', $categorie)}}" type="button"  class="py-3 px-3 flex items-center text-sm font-medium text-center text-black bg-orange-600 text-white rounded-lg hover:bg-gray-100 hover:text-gray-900  rounded-lg border border-green-200  ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('categories.delete', $categorie) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit"  class="flex items-center mt-3 py-2 px-3 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <div class="flex justify-center">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h1>Aucune Categorie existes</h1>
                </div>
            @endforelse
            </tbody>
        </table>
    </div>
    </div>

@endsection
