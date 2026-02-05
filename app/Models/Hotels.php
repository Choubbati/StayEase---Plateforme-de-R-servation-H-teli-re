<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{

    protected $fillables =
    [
        'nom', 'description', 'ville', 'image'
    ];

    public function chambres(): HasMany
    {
        return $this->hasMany(Chambre::class);
    }
}
