<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chambre;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$chambres = Chambre::with('tags', 'properties')->get();
return view('Chambres.index', compact('chambres'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Chambres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['nom' => 'required|string|max:50']);
        Chambre::create($validated);
        return redirect()->route('chambres.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
