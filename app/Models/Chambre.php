<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chambre extends Model
{
       protected $fillable =
    [
        'hotel_id', 'number', 'price_per_night', 'capacity', 'description'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'chambres_tags');
    }
    public function properties(): BelongsToMany
    {
         return $this->belongsToMany(Propertie::class,'chambres_properties');
    }
}
