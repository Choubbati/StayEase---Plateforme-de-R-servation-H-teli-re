@extends('layouts.clean')
@section('childContent')

    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 ">Modifier Categorie</h2>
            <form action="{{ route('categories.update', $categorie) }}" method="post">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900">Nouveau Categorie</label>
                        <input type="text" name="nom" id="nom"  value="{{ $categorie->nom }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-[#2563eb] focus:border-primary-[#2563eb] block w-full p-2.5 " placeholder="Entrer nom de l'hôtel" required="">
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-[#1d4ed8] rounded-lg    hover:bg-primary-[#1e40af]">
                    Enregistrer Categorie
                </button>
            </form>
        </div>
    </section>
@endsection

