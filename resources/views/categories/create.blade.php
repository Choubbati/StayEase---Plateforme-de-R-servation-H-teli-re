@extends('layouts.clean')
@section('childContent')

    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 ">Ajouter nouveau Categorie</h2>
            @foreach($errors->all() as $error)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Holy smokes!</strong>
                    <span class="block sm:inline"> {{$error}}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    </span>
                </div>
                <br>
            @endforeach
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900">Nom Categorie</label>
                        <input type="text" name="nom" id="nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-[#2563eb] focus:border-primary-[#2563eb] block w-full p-2.5 " placeholder="Entrer nom de l'hôtel" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="quantite" class="block mb-2 text-sm font-medium text-gray-900">Quantite</label>
                        <input type="number" name="quantite" id="quantite" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-[#2563eb] focus:border-primary-[#2563eb] block w-full p-2.5 " placeholder="Entrer nom de l'hôtel" required="">
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-[#1d4ed8] rounded-lg    hover:bg-primary-[#1e40af]">
                    Ajouter Categorie
                </button>
            </form>
        </div>
    </section>
@endsection

