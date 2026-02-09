@component('mail::message')
    # Réservation confirmée ✅

    Bonjour {{ $reservation->user->Firstname }},

    Votre réservation est confirmée.

    - **Check-in** : {{ $reservation->check_in->format('d/m/Y') }}
    - **Check-out** : {{ $reservation->check_out->format('d/m/Y') }}
    - **Total** : {{ number_format($reservation->total_price, 2) }} MAD

    Merci pour votre confiance,
    **StayEase**
@endcomponent
