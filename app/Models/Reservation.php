<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'chambre_id', 'date_debut', 'date_fin', 'statut', 'prix_total'];

    public function users():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories():BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }
    public function chambres():BelongsTo
    {
        return $this->belongsTo(Chambre::class);
    }

}
