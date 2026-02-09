<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Propertie extends Model
{
    protected $fillable =['nom'];

    public function chambres(): BelongsToMany
    {
    return $this->belongsToMany(Chambre::class, 'chambre_properties');
    }
}

