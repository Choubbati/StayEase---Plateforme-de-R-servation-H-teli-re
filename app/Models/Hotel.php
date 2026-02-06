<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Chambre;



class Hotel extends Model
{
    use HasFactory;

    protected $fillable  =['nom','description', 'ville', 'image'];

    public function chambres(): HasMany
    {
        return $this->hasMany(Chambre::class);
    }
}
