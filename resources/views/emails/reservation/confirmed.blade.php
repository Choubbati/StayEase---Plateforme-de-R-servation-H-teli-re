
@component('mail::message')
# Réservation confirmée ✅

Bonjour {{ $reservation->user->Firstname ?? $reservation->user->name }},

Votre réservation a été **confirmée avec succès**.

### 🏨 Détails :
- **Chambre :** {{ $reservation->chambre->nom ?? 'Chambre #' . $reservation->chambre->id }}
- **Arrivée :** {{ $reservation->check_in->format('d/m/Y') }}
- **Départ :** {{ $reservation->check_out->format('d/m/Y') }}
- **Nuits :** {{ $reservation->nights }}
- **Prix total :** {{ number_format($reservation->total_prix, 2) }} MAD

Merci pour votre confiance.  
**StayEase**

@endcomponent
