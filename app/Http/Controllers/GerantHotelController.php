<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;


class GerantHotelController extends Controller
{

    public function index(){

        $count = Hotel::all()->count();
        $hotels = Hotel::where('status', 'approved')
            ->latest()
            ->paginate(9);
        // $hotels = Hotel::all();

        return view('hotels.dashbord', compact('hotels', 'count'));
    }

    public function  show($hotel)
    {
        if($hotel){
        $hotel = Hotel::find($hotel);
        }
        return view('hotels.show', compact('hotel'));


    }

    public function create(){
        return view('hotels.create');
    }

    public function store(Request $request){

        $validatedHotel = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            //'categorie' => 'required',
            'ville' => 'required',
            'image' => 'required',
        ]);
        $validatedHotel['status'] = "pending";
        $validatedHotel['manager_id']=Auth::id();
        //dd($validatedHotel);

        $hotels= Hotel::create($validatedHotel);
//        dd($hotels);
        return redirect()->route('hotels.hotels');
    }

    public function edit($hotel){

        if($hotel){
            $hotel = Hotel::find($hotel);
        }

        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, $hotel){

        if($hotel){
            $hotel = Hotel::find($hotel);
        }

        $validatedHotel = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'ville' => 'required',
            'image' => 'required'
        ]);

        $hotel->update($validatedHotel);
        return redirect()->route('hotels.hotels');
    }

    public function destroy($hotel){

        if($hotel){
            $hotel = Hotel::find($hotel);
        }

        $hotel->delete();
        return redirect()->route('hotels.hotels');

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

}
