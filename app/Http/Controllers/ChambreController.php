<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Chambre;
use App\Models\Tag;
use App\Models\Propertie;
use App\Models\Hotel;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allTags = Tag::all();
        $allProperties = Propertie::all();
        $categories = Categorie::all();

        $query = Chambre::with('tags', 'properties');

        if ($request->filled('cat') && $request->cat != "0") {
            $query->where('category_id', $request->cat);
        }
        if ($request->filled('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tags.id', $request->tag);
            });
        }

        if ($request->filled('property')) {
            $query->whereHas('properties', function ($q) use ($request) {
                $q->where('properties.id', $request->property);
            });
        }

        $chambres = $query->get();

        return view('Chambres.index', compact(
            'chambres',
            'categories',
            'allTags',
            'allProperties'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
         $tags = Tag::all();
        $properties = Propertie::all();
        return view('Chambres.create', compact('tags', 'properties', 'categories'));
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
            'image' => 'nullable|string|max:2048',
            'category_id' => 'required|integer|exists:categories,id'
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
        $hotel = Hotel::with('chambres')->find($chambre->hotel_id);
        return view('Chambres.show', compact('chambre', 'hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chambre $chambre)
    {
        $categories = Categorie::all();
        $tags = Tag::all();
    $properties = Propertie::all();
    return view('Chambres.edit', compact('chambre', 'tags', 'properties', 'categories'));
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
            'image' => 'nullable|string|max:2048',
            'category_id' => 'required|integer|exists:categories,id'
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

public function filter(Request $request)
    {
        $query = Chambre::query();

        if ($request->has('category_id') && $request->category_id != 0) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('tags')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->whereIn('id', $request->tags);
            });
        }

        if ($request->has('properties')) {
            $query->whereHas('properties', function ($q) use ($request) {
                $q->whereIn('id', $request->properties);
            });
        }

        $chambres = $query->get();
        return view('Chambres.index', compact('chambres'));
    }

}
