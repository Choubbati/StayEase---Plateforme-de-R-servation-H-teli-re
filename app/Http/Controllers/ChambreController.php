<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Chambre;
use App\Models\Tag;
use App\Models\Propertie;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Categorie::all();

        // Étape 1 : Récupérer et valider les dates (pour US 4.2)
        $dateDebut = $request->input('date_debut');
        $dateFin = $request->input('date_fin');

        // Validation des dates : check-in doit être aujourd'hui ou après, check-out après check-in
        $request->validate([
            'date_debut' => 'nullable|date|after_or_equal:today',  // nullable si pas fourni
            'date_fin' => 'nullable|date|after:date_debut',
        ]);

        // Étape 2 : Construire la requête de base avec eager loading (pour optimiser)
        $query = Chambre::with('tags', 'properties', 'categories');  // Ajoute 'categorie' si relation existe

        // Étape 3 : Appliquer le filtre par catégorie (ton code original)
        if ($request->has('cat') && $request['cat'] !== 0) {
            $query->where('category_id', $request['cat']);  // Utilise 'category_id' si c'est le nom de la colonne
        }

        // Étape 4 : Appliquer le filtre de disponibilité si les dates sont fournies (US 4.2)
        if ($dateDebut && $dateFin) {
            $query->disponiblesEntre($dateDebut, $dateFin);  // Utilise le scope défini dans Chambre.php
        }

        // Étape 5 : Exécuter la requête et paginer (ajoute pagination pour fluidité, comme dans US 2.3)
        $chambres = $query->paginate(10);  // Ou get() si tu préfères sans pagination pour l'instant

        // Étape 6 : Retourner la vue avec les données (ajoute les dates pour les garder dans le formulaire)
        return view('Chambres.index', compact('chambres', 'categories', 'dateDebut', 'dateFin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $properties = Propertie::all();
        $categories = Categorie::all();
        return view('Chambres.create', compact('tags', 'properties','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|integer',
            'number' => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);
        $chambre = Chambre::create($validated);
        $chambre->tags()->sync($request->get('tags', []));
        $chambre->properties()->sync($request->get('properties', []));
        return redirect()->route('chambres.show', $chambre);
    }


    /**
     * Display the specified resource.
     */
    public function show(Chambre $chambre)
    {
        return view('Chambres.show', compact('chambre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chambre $chambre)
    {

        $tags = Tag::all();
        $properties = Propertie::all();

        return view('Chambres.edit', compact('chambre', 'tags', 'properties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chambre $chambre)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|integer',
            'number' => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $chambre->update($validated);

        $chambre->tags()->sync($request->get('tags', []));
        $chambre->properties()->sync($request->get('properties', []));

        return redirect()->route('chambres.show', $chambre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chambre = Chambre::findOrFail($id);
        $chambre->delete();
        return redirect()->route('chambres.index');
    }

}
