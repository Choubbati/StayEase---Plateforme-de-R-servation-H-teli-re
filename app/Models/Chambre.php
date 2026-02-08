<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }
}
