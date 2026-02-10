<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $dateDebut = $request->input('date_debut');
        $dateFin = $request->input('date_fin');
        $request->validate([
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        $chambres = Chambre::with('hotels')
            ->scopeDisponiblesEntre($dateDebut, $dateFin)
            ->paginate(3);
        return view('Reservation', compact('chambres', 'dateDebut', 'dateFin'));


    }
}
