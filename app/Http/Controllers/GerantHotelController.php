<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Chambre;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;


class GerantHotelController extends Controller
{

    public function index(){

        $categories = Categorie::all();
        $count = Hotel::where('status', 'approved')->count();
        $hotels = Hotel::where('status', 'approved')->where('user_id', Auth::id())
            ->latest()
            ->paginate(9);
        return view('hotels.dashbord', compact('hotels', 'count', 'categories'));
    }

    public function  show($hotel)
    {
        if($hotel){
        $hotel = Hotel::find($hotel)->where('user_id', Auth::id());
        }
        return view('hotels.show', compact('hotel'));
    }

    public function create(){
        return view('hotels.create');
    }

    public function store(Request $request){

        $validatedHotel = $request->validate([
            'nom' => 'required|unique:hotels|min:6',
            'description' => 'required|max:255',
            'ville' => 'required',
            'image' => 'required',
        ]);
        $validatedHotel['status'] = "pending";
        $validatedHotel['manager_id']=Auth::id();
        //dd($validatedHotel);
        $validatedHotel['user_id'] = Auth::id();

        $hotels= Hotel::create($validatedHotel);
//        dd($hotels);
        return redirect()->route('hotels.hotels')->with('success', "Hotel creer avec succes, Il faut attendre la validation de l'admin");
    }

    public function edit($hotel){

        if($hotel){
            $hotel = Hotel::find($hotel)->where('user_id', Auth::id());
        }

        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, $hotel){

        if($hotel){
            $hotel = Hotel::find($hotel)->where('user_id', Auth::id());
        }

        $validatedHotel = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'ville' => 'required',
            'image' => 'required'
        ]);

        $hotel->update($validatedHotel);
        return redirect()->route('hotels.hotels')->with('success', 'Hotel modifier avec succes');;
    }

    public function destroy($hotel){

        if($hotel){
            $hotel = Hotel::find($hotel)->where('user_id', Auth::id());
        }

        $hotel->delete();
        return redirect()->route('hotels.hotels')->with('success', 'Hotel supprimer avec succes');

    }

     public function search(Request $request)
    {
        $nom = $request->query('nom');
        $ville = $request->query('ville');

        $hotels = Hotel::query()
            ->where('status', 'approved')
            ->when($nom, function ($q) use ($nom) {
                $q->where('nom', 'like', "%{$nom}%");
            })
            ->when($ville, function ($q) use ($ville) {
                $q->where('ville', 'like', "%{$ville}%");
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('admin.hotels.index', compact('hotels'));
    }
    public function filter(Request $request)
    {
        //dd($request['cat']);
        $chambres = Chambre::with('categories')->where('chambres.category_id', $request['cat'])->get();
        //dd($chambres);
        return view('hotels.dashbord', compact('chambres'));

    }

}
