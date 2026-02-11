<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirme;
use App\Models\Chambre;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'chambre_id' => ['required', 'exists:chambres,id'],
            'check_in'   => ['required', 'date', 'after_or_equal:today'],
            'check_out'  => ['required', 'date', 'after:check_in'],
        ]);

        $checkIn  = Carbon::parse($validated['check_in'])->startOfDay();
        $checkOut = Carbon::parse($validated['check_out'])->startOfDay();
        $nights   = $checkIn->diffInDays($checkOut);

        $chambre = Chambre::findOrFail($validated['chambre_id']);

        $overlap = Reservation::where('chambre_id', $chambre->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->where(function ($q) use ($checkIn, $checkOut) {
                $q->where('check_in', '<', $checkOut)
                  ->where('check_out', '>', $checkIn);
            })
            ->exists();

        if ($overlap) {
            return back()
                ->withInput()
                ->withErrors(['check_in' => 'Cette chambre est déjà réservée pour cette période.']);
        }

        $prixParNuit = (float) ($chambre->prix ?? 500);
        $totalPrix   = $prixParNuit * $nights;

        $reservation = Reservation::create([
            'user_id'     => Auth::id(),
            'chambre_id'  => $chambre->id,
            'check_in'    => $checkIn->toDateString(),
            'check_out'   => $checkOut->toDateString(),
            'nights'      => $nights,
            'total_prix'  => $totalPrix, 
            'status'      => 'confirmed',
        ]);

        Mail::to(Auth::user()->email)->send(new ReservationConfirme($reservation));

        return back()->with('success', 'Réservation confirmée. Email envoyé (simulé).');
    }
}
