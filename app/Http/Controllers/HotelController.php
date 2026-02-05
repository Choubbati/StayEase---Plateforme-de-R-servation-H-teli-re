<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function index(){
        $$hotels = Hotel::where('status', 'approved')
            ->latest()
            ->paginate(9);

        return view('hotels.index', compact('hotels'));
    }

    public function create(){
        return view('hotels.create');
    }

    public function store(Request $request){
        $validatedHotel = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'ville' => 'required',
            'image' => 'required',
        ]);
        Hotel::create($validatedHotel);
        return redirect()->route('hotels.index');
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
        return redirect()->route('hotels.index');
    }

    public function destroy($hotel){

        if($hotel){
            $hotel = Hotel::find($hotel);
        }

        $hotel->delete();
        return redirect()->route('hotels.index');

    }

     public function search(Request $request)
    {
        $nom = $request->query('nom');
        $ville = $request->query('ville');

        $hotels = Hotel::query()
            ->where('status', 'approved')
            ->when($name, function ($q) use ($nom) {
                $q->where('name', 'like', "%{$nom}%");
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
