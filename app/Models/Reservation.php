<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $table = 'reservation';
    protected $fillable= ["user_id","chambre_id","check_in","check_out","nights","total_prix","status"];

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
