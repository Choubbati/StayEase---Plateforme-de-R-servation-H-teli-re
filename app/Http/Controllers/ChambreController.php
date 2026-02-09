<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chambre;
use App\Models\Tag;
use App\Models\Propertie;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chambres = Chambre::with('tags', 'properties')->get();
        return view('Chambres.index', compact('chambres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $tags = Tag::all();
        $properties = Propertie::all();

    return view('Chambres.create', compact('tags', 'properties'));
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
