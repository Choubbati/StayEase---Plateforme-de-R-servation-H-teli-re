<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $table = 'reservation';
    protected $fillable= ["user_id","chambre_id","check_in","check_out","nights","total_prix","status"];

    protected $casts = [
        "check_in"=>"date",
        "check_out"=>"date",
        "total_prix"=>"decimal:2"
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chambre():BelongsTo
    {
        return $this->belongsTo(Chambre::class);
    }

}
