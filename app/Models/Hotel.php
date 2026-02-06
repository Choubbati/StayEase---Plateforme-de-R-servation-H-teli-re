<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Chambre;



class Hotel extends Model
{
    use HasFactory;

    protected $fillable  =['nom','description', 'ville', 'image', 'user_id'];

    public function chambres(): HasMany
    {
        return $this->hasMany(Chambre::class);
    }

    public function users(): BelongsTo
    {
        return  $this->belongsTo(User::class);
    }
}
