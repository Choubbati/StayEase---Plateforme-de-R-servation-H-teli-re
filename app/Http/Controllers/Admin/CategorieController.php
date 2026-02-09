<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Chambre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    public function index(){

        $categories = Categorie::all()->where('user_id', Auth::id());
        $count = $categories->count();
        return view('admin.categories.index', compact('categories', 'count'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){

        $validatedCategorie = $request->validate([
            'nom' => 'required',
            'quantite' => 'required|min:0',
        ]);
        $validatedCategorie['user_id'] = Auth::id();

        $categories = Categorie::create($validatedCategorie);

        return redirect()->route('categories.index')->with('success', 'Categorie creer avec succes');
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
        return redirect()->route('categories.index')->with('success', 'Categorie modifier avec succes');;
    }

    public function destroy($categorie){

        if($categorie){
            $categorie = Categorie::find($categorie);
        }

        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Categorie supprimer avec succes');

    }

    public function filter(Request $request)
    {
        $nom = $request->query('nom');
        $catgorie = Categorie::find($nom);
        $chambres = Chambre::all()->with('categories')->where('categorie_id', $catgorie->id);
        return view('hotels.dashbord', compact('chambres'));
    }
}
