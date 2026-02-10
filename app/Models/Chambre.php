<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chambre extends Model
{
    use SoftDeletes;

       protected $fillable =
    [
        'hotel_id', 'number', 'price_per_night', 'capacity', 'description', 'category_id'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'chambres_tags');
    }
    public function properties(): BelongsToMany
    {
         return $this->belongsToMany(Propertie::class,'chambres_properties');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

//    public function scopeDisponiblesEntre($query, $dateDebut, $dateFin){
//        return $query->whereDoesHave('reservations', function($q) use ($dateDebut, $dateFin){
//            $q->where(function ($subQuery) use ($dateDebut, $dateFin){
//                $subQuery->where('date_debut', '<', $dateFin)
//                    ->where('date_fin', '>', $dateDebut);
//            });
//        });
//    }

//    public function scopeCategoriesDisponiblesEntre($query, $hotelId, $dateDebut, $dateFin)
//    {
//        return $query
//            ->select('category_id')
//            ->where('hotel_id', $hotelId)
//            ->groupBy('category_id')
//            ->havingRaw('
//            COUNT(*) > (
//                SELECT COUNT(reservations.id)
//                FROM reservations
//                JOIN chambres c2 ON c2.id = reservations.chambre_id
//                WHERE c2.hotel_id = ?
//                AND c2.category_id = chambres.category_id
//                AND reservations.statut = "confirmée"
//                AND reservations.date_debut < ?
//                AND reservations.date_fin > ?
//            )
//        ', [$hotelId, $dateFin, $dateDebut]);
//    }
}



