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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['nom' => 'required|string|max:50']);
        Propertie::create($validated);
        return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Propertie $propertie)
    {
        $propertie->delete();
        return redirect()->route('properties.index');
    }
}
