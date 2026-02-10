<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirme;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'chambre_id' => 'required|exists:chambres,id',
            'check_in'   => 'required|date|after_or_equal:today',
            'check_out'  => 'required|date|after:check_in',
        ]);

        $checkIn  = Carbon::parse($validated['check_in']);
        $checkOut = Carbon::parse($validated['check_out']);
        $nights   = $checkIn->diffInDays($checkOut);

        $reservation = Reservation::create([
            'user_id'      => Auth::id(),
            'chambre_id'   => $validated['chambre_id'],
            'check_in'     => $checkIn,
            'check_out'    => $checkOut,
            'nights'       => $nights,
            'total_price' => 500 * $nights, // مثا
            'status'       => 'confirmed',
        ]);

        Mail::to($reservation->user->email)
            ->send(new ReservationConfirme($reservation));

        return redirect()
            ->back()
            ->with('success', 'Réservation confirmée. Email envoyé (simulé).');
    }
}
