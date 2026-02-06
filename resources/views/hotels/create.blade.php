@extends('layouts.clean')
@section('childContent')

    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 ">Ajouter nouveau Hotel</h2>
            <form action="{{ route('hotels.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900">Nom Hotel</label>
                        <input type="text" name="nom" id="nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-[#2563eb] focus:border-primary-[#2563eb] block w-full p-2.5 " placeholder="Entrer nom de l'hôtel" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image Hotel</label>
                        <input type="text" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-[#2563eb] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Http:\\..." required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description de l'hôtel</label>
                        <textarea id="description" name="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-[#3b82f6] focus:border-primary-[#3b82f6] " placeholder="Description de l'hôtel"></textarea>
                    </div>
                    <div class="w-full">
                        <label for="Ville" class="block mb-2 text-sm font-medium text-gray-900">Ville</label>
                        <input type="text" name="ville" id="ville" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-[#2563eb] focus:border-primary-[#2563eb] block w-full p-2.5 " placeholder="2999MAD" required="">
                    </div>
                    <!--
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catégorie</label>
                        <select id="category" name="categorie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select category</option>
                            <option value="TV">TV/Monitors</option>
                            <option value="PC">PC</option>
                            <option value="GA">Gaming/Console</option>
                            <option value="PH">Phones</option>
                        </select>
                    </div>
                    -->

                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-[#1d4ed8] rounded-lg    hover:bg-primary-[#1e40af]">
                    Ajouter Hotel
                </button>
            </form>
        </div>
    </section>
@endsection

