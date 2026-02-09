<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Tag extends Model
{
    protected $fillable =  ['name', 'slug'];
    public function chambres(): BelongsToMany
    {
        return $this->belongsToMany(Chambre::class, 'chambres_tags');
    }
}
