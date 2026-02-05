<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>
            <h2 class="font-semibold text-xl text-gray-600">Enregistrer Votre Hotel</h2>

            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="font-medium text-lg">Informations sur l'hotel</p>
                        <p>Tous les champs sont obligatoires</p>
                    </div>
                    <form method="post" action="{{ route('hotels.store') }}">
                        @csrf
                    <div class="lg:col-span-2">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <label for="nom">Nom de l'hotel</label>
                                <input type="text" name="nom" id="nom" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                            </div>

                            <div class="md:col-span-5">
                                <label for="description">Description de l'hotel</label>
                                <input type="text" name="description" id="description" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Decrire l'hotel" />
                            </div>

                            <div class="md:col-span-3">
                                <label for="ville">Ville</label>
                                <input type="text" name="ville" id="ville" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Entrer la ville ou l'hotel appatient" />
                            </div>

                            <div class="md:col-span-2">
                                <label for="image">Image URL</label>
                                <input type="text" name="image" id="image" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Image URL de l'hotel" />
                            </div>
                            <div class="md:col-span-5 text-right">
                                <div class="inline-flex items-end">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
