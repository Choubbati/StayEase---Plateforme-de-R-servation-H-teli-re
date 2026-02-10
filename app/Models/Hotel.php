<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Chambre;
use App\Models\User;

class Hotel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nom', 'description', 'ville', 'user_id', 'image', 'status'];

    public function chambres(): HasMany
    {
        return $this->hasMany(Chambre::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
