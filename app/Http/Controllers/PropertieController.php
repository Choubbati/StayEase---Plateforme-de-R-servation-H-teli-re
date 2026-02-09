<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propertie;
use Illuminate\Support\Str;

class PropertieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Properties.index', ['properties' => Propertie::all()]);
    }


    public function create()
    {
        return view('Properties.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate(['nom' => 'required|string|max:50']);
        Propertie::create($validated);
        return redirect()->route('properties.index') ->with('success', 'Propriété ajoutée avec succès !');
    }

    public function destroy($id)
    {
        $propertie = Propertie::findOrFail($id);
        $propertie->delete();
        return redirect()->route('properties.index')->with('success', 'Propriété supprimée avec succès !');
    }
}
