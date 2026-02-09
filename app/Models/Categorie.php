<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nom', 'user_id', 'quantite'];

    public function chambres(): HasMany
    {
        return $this->hasMany(Chambre::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
