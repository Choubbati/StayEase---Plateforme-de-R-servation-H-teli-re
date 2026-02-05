<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function index(){
        $hotels = Hotel::all();
        return view('hotels.Hotels', compact('hotels'));
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
        $hotels= Hotel::create($validatedHotel);
//        dd($hotels);
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

}
