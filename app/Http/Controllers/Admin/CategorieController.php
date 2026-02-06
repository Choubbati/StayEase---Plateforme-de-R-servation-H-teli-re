<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){

        $validatedCategorie = $request->validate([
            'nom' => 'required',
        ]);
        $validatedCategorie = Categorie::create($validatedCategorie);
        return redirect()->route('admin.categories')->with('success', 'Categorie creer avec succes');
    }

    public function edit($categorie){

        if($categorie){
            $categorie = Categorie::find($categorie);
        }

        return view('admin.categories.edit', compact('categorie'));
    }

    public function update(Request $request, $categorie){

        if($categorie){
            $categorie = Categorie::find($categorie);
        }

        $validatedCategorie = $request->validate([
            'nom' => 'required',
        ]);

        $categorie->update($validatedCategorie);
        return redirect()->route('admin.categories')->with('success', 'Categorie modifier avec succes');;
    }

    public function destroy($categorie){

        if($categorie){
            $categorie = Categorie::find($categorie);
        }

        $categorie->delete();
        return redirect()->route('admin.categories')->with('success', 'Categorie supprimer avec succes');

    }
}
